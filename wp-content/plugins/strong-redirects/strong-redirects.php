<?php
/**
 * Plugin Name: Strong Redirects
 * Description: Fast server-friendly redirects (301/302/307/308) with admin UI, import/export, bulk actions, inline edit, pagination.
 * Version: 1.8
 * Author: Your Name
 */

if (!defined('ABSPATH')) exit;

global $wpdb;
define('SR_TABLE', $wpdb->prefix . 'strong_redirects');

/* ---------------------------
   Activation: create table
   --------------------------- */
register_activation_hook(__FILE__, function(){
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS " . SR_TABLE . " (
        id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        old_url VARCHAR(255) NOT NULL,
        new_url VARCHAR(255) NOT NULL,
        type SMALLINT(3) NOT NULL DEFAULT 301,
        hits BIGINT(20) UNSIGNED NOT NULL DEFAULT 0,
        active TINYINT(1) NOT NULL DEFAULT 1,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        last_used DATETIME NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
});

/* ---------------------------
   Admin menu
   --------------------------- */
add_action('admin_menu', function() {
    add_menu_page(
        'Strong Redirects',
        'Strong Redirects',
        'manage_options',
        'strong-redirects',
        'sr_admin_page',
        'dashicons-randomize',
        80
    );
});

/* ---------------------------
   Admin page
   --------------------------- */
function sr_admin_page() {
    global $wpdb;

    // ------------- Add / Edit (top form)
    if (isset($_POST['sr_submit'])) {
        $old = isset($_POST['old_url']) ? sanitize_text_field($_POST['old_url']) : '';
        $new = isset($_POST['new_url']) ? esc_url_raw($_POST['new_url']) : '';
        $type = intval($_POST['type'] ?? 301);
        $id = intval($_POST['id'] ?? 0);

        if ($old && $new) {
            if ($id) {
                $wpdb->update(SR_TABLE, ['old_url'=>$old,'new_url'=>$new,'type'=>$type], ['id'=>$id]);
                echo '<div class="updated notice"><p>Redirect updated!</p></div>';
            } else {
                $wpdb->insert(SR_TABLE, ['old_url'=>$old,'new_url'=>$new,'type'=>$type]);
                echo '<div class="updated notice"><p>Redirect added!</p></div>';
            }
        } else {
            echo '<div class="error notice"><p>Please provide both From and To URLs.</p></div>';
        }
    }

    // ------------- Bulk actions
    if (isset($_POST['sr_bulk_action']) && isset($_POST['sr_bulk_ids'])) {
        $action = sanitize_text_field($_POST['sr_bulk_action']);
        $ids = array_map('intval', (array) $_POST['sr_bulk_ids']);
        if (!empty($ids)) {
            $id_list = implode(',', $ids);
            switch ($action) {
                case 'trash':
                    $wpdb->query("DELETE FROM ".SR_TABLE." WHERE id IN($id_list)");
                    echo '<div class="updated notice"><p>Deleted selected redirects.</p></div>';
                    break;
                case 'activate':
                    $wpdb->query("UPDATE ".SR_TABLE." SET active=1 WHERE id IN($id_list)");
                    echo '<div class="updated notice"><p>Activated selected redirects.</p></div>';
                    break;
                case 'deactivate':
                    $wpdb->query("UPDATE ".SR_TABLE." SET active=0 WHERE id IN($id_list)");
                    echo '<div class="updated notice"><p>Deactivated selected redirects.</p></div>';
                    break;
            }
        }
    }

    // ------------- Single GET actions
    if (isset($_GET['sr_action'], $_GET['id'])) {
        $id = intval($_GET['id']);
        switch ($_GET['sr_action']) {
            case 'trash':
                $wpdb->delete(SR_TABLE, ['id'=>$id]);
                echo '<div class="updated notice"><p>Redirect deleted.</p></div>';
                break;
            case 'activate':
                $wpdb->update(SR_TABLE, ['active'=>1], ['id'=>$id]);
                echo '<div class="updated notice"><p>Redirect activated.</p></div>';
                break;
            case 'deactivate':
                $wpdb->update(SR_TABLE, ['active'=>0], ['id'=>$id]);
                echo '<div class="updated notice"><p>Redirect deactivated.</p></div>';
                break;
        }
    }

    // ------------- Inline edit submission
    if (isset($_POST['sr_inline_edit'])) {
        $id = intval($_POST['sr_inline_id']);
        $old = sanitize_text_field($_POST['sr_inline_old'] ?? '');
        $new = esc_url_raw($_POST['sr_inline_new'] ?? '');
        $type = intval($_POST['sr_inline_type'] ?? 301);
        if ($id && $old && $new) {
            $wpdb->update(SR_TABLE, ['old_url'=>$old,'new_url'=>$new,'type'=>$type], ['id'=>$id]);
            echo '<div class="updated notice"><p>Redirect updated (inline).</p></div>';
        } else {
            echo '<div class="error notice"><p>Inline update failed — provide values.</p></div>';
        }
    }

    // ------------- Import CSV (file input + import button same form)
    if (isset($_POST['sr_import']) && !empty($_FILES['sr_csv']['tmp_name'])) {
        $file = fopen($_FILES['sr_csv']['tmp_name'], 'r');
        if ($file) {
            $added = 0;
            while (($line = fgetcsv($file)) !== FALSE) {
                $old = isset($line[0]) ? sanitize_text_field($line[0]) : '';
                $new = isset($line[1]) ? esc_url_raw($line[1]) : '';
                $type = isset($line[2]) ? intval($line[2]) : 301;
                if ($old && $new) {
                    $wpdb->insert(SR_TABLE, ['old_url'=>$old,'new_url'=>$new,'type'=>$type]);
                    $added++;
                }
            }
            fclose($file);
            echo '<div class="updated notice"><p>Imported CSV — added '.$added.' redirects.</p></div>';
        } else {
            echo '<div class="error notice"><p>Unable to open uploaded file.</p></div>';
        }
    }

    // ------------- Export CSV
    if (isset($_POST['sr_export'])) {
        $rows_export = $wpdb->get_results("SELECT old_url,new_url,type FROM ".SR_TABLE);
        if ($rows_export) {
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="strong-redirects-export-'.date('Ymd').'.csv"');
            $out = fopen('php://output', 'w');
            fputcsv($out, ['old_url','new_url','type']);
            foreach ($rows_export as $r) fputcsv($out, [$r->old_url, $r->new_url, $r->type]);
            fclose($out);
            exit;
        } else {
            echo '<div class="notice"><p>No redirects to export.</p></div>';
        }
    }

    // ------------- Search & Pagination
    $search = isset($_GET['s']) ? sanitize_text_field($_GET['s']) : '';
    $per_page = 20;
    $page = max(1, intval($_GET['paged'] ?? 1));
    $offset = ($page - 1) * $per_page;

    if ($search) {
        $like = "%{$search}%";
        $where = $wpdb->prepare("WHERE old_url LIKE %s OR new_url LIKE %s", $like, $like);
    } else {
        $where = '';
    }

    $total = intval($wpdb->get_var("SELECT COUNT(*) FROM ".SR_TABLE." $where"));
    $rows = $wpdb->get_results("SELECT * FROM ".SR_TABLE." $where ORDER BY created_at DESC LIMIT $offset, $per_page");

    // ------------- Admin HTML
    ?>
    <div class="wrap">
        <h1>Strong Redirects</h1>

        <!-- Add Redirect Form -->
        <form method="post" style="margin-bottom:20px;">
            <table class="form-table">
                <tr>
                    <th>Old URL (From)</th>
                    <td><input type="text" name="old_url" required style="width:100%;" placeholder="/old-page"></td>
                </tr>
                <tr>
                    <th>New URL (To)</th>
                    <td><input type="text" name="new_url" required style="width:100%;" placeholder="https://yourdomain.com/new-page/"></td>
                </tr>
                <tr>
                    <th>Redirect Type</th>
                    <td>
                        <select name="type">
                            <option value="301">301 Permanent</option>
                            <option value="302">302 Temporary</option>
                            <option value="307">307 Temporary</option>
                            <option value="308">308 Permanent</option>
                        </select>
                    </td>
                </tr>
            </table>
            <p><input type="submit" name="sr_submit" class="button button-primary" value="Add Redirect"></p>
        </form>

        <!-- Import / Export / Search row (responsive) -->
        <div style="display:flex; flex-wrap:wrap; gap:10px; align-items:center; margin-bottom:15px;">
            <!-- Import: choose file + import button (same form so they stay together) -->
            <form method="post" enctype="multipart/form-data" style="display:flex; gap:6px; align-items:center; flex-wrap:wrap;">
                <input type="file" name="sr_csv" style="min-width:180px;">
                <input type="submit" name="sr_import" class="button" value="Import CSV">
            </form>

            <!-- Export -->
            <form method="post" style="display:flex; gap:6px; align-items:center;">
                <input type="submit" name="sr_export" class="button" value="Export CSV">
            </form>

            <!-- Search aligned right on large screens -->
            <form method="get" style="margin-left:auto; display:flex; gap:8px; align-items:center; flex-wrap:wrap;">
                <input type="hidden" name="page" value="strong-redirects">
                <input type="text" name="s" placeholder="Search redirects (from or to)..." value="<?php echo esc_attr($search); ?>" style="min-width:320px; padding:6px;">
                <input type="submit" class="button" value="Search">
            </form>
        </div>

        <!-- Bulk actions + table -->
        <form method="post">
            <div style="margin-bottom:8px;">
                <select name="sr_bulk_action">
                    <option value="">Bulk Actions</option>
                    <option value="activate">Activate</option>
                    <option value="deactivate">Deactivate</option>
                    <option value="trash">Trash</option>
                </select>
                <input type="submit" class="button" value="Apply">
            </div>

            <div style="overflow-x:auto;">
                <table class="widefat fixed striped" style="min-width:1100px; table-layout:fixed;">
                    <thead>
                        <tr>
                            <th style="width:60px;">S.No</th>
                            <th style="width:30px;"><input type="checkbox" class="sr_check_all"></th>
                            <th style="width:180px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;">From</th>
                            <th style="width:420px;">To</th>
                            <th style="width:60px;">Type</th>
                            <th style="width:70px;">Hits</th>
                            <th style="width:120px;">Created On</th>
                            <th style="width:120px;">Last Used</th>
                            <th style="width:220px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sno = $offset + 1;
                        if (!empty($rows)) {
                            foreach ($rows as $row) :
                        ?>
                        <tr>
                            <td><?php echo $sno++; ?></td>
                            <td><input type="checkbox" name="sr_bulk_ids[]" value="<?php echo intval($row->id); ?>"></td>
                            <td style="overflow:hidden; text-overflow:ellipsis; white-space:nowrap;"><?php echo esc_html($row->old_url); ?></td>
                            <td style="word-wrap:break-word;"><?php echo esc_html($row->new_url); ?></td>
                            <td><?php echo intval($row->type); ?></td>
                            <td><?php echo intval($row->hits); ?></td>
                            <td><?php echo esc_html($row->created_at); ?></td>
                            <td><?php echo esc_html($row->last_used ?? '-'); ?></td>
                            <td>
                                <button type="button" class="button sr_inline_edit_btn" style="background:#1472ba;color:#fff; border-color:#0f5f98; vertical-align:middle; padding:6px 10px; margin-right:6px;"
                                    data-id="<?php echo intval($row->id); ?>"
                                    data-old="<?php echo esc_attr($row->old_url); ?>"
                                    data-new="<?php echo esc_attr($row->new_url); ?>"
                                    data-type="<?php echo intval($row->type); ?>">
                                    Edit
                                </button>
                                <a href="<?php echo esc_url( admin_url('?page=strong-redirects&sr_action=trash&id='.$row->id) ); ?>">Trash</a> |
                                <a href="<?php echo esc_url( admin_url('?page=strong-redirects&sr_action='.($row->active ? 'deactivate':'activate').'&id='.$row->id) ); ?>"><?php echo $row->active ? 'Deactivate' : 'Activate'; ?></a> |
                                <a href="<?php echo esc_url($row->new_url); ?>" target="_blank">View</a>
                            </td>
                        </tr>
                        <?php
                            endforeach;
                        } else {
                            echo '<tr><td colspan="9">No redirects found.</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </form>

        <!-- Pagination -->
        <div style="margin-top:12px;">
            <?php
            $total_pages = max(1, ceil($total / $per_page));
            if ($total_pages > 1) {
                for ($i = 1; $i <= $total_pages; $i++) {
                    $style = $i == $page ? 'font-weight:bold;margin-right:6px;' : 'margin-right:6px;';
                    echo '<a href="'.esc_url(admin_url('admin.php?page=strong-redirects&paged='.$i.'&s='.urlencode($search))).'" style="'.$style.'">'.$i.'</a>';
                }
            }
            ?>
        </div>

    </div>

    <!-- Inline Edit Modal & JS -->
    <script>
    document.addEventListener('DOMContentLoaded', function(){
        // toggle all checkboxes
        const master = document.querySelector('.sr_check_all');
        if (master) {
            master.addEventListener('change', function(){
                document.querySelectorAll('input[name="sr_bulk_ids[]"]').forEach(cb => cb.checked = master.checked);
            });
        }

        // Inline edit buttons -> create modal on demand
        document.querySelectorAll('.sr_inline_edit_btn').forEach(function(btn){
            btn.addEventListener('click', function(){
                let modal = document.getElementById('sr_inline_modal');
                if (!modal) {
                    modal = document.createElement('div');
                    modal.id = 'sr_inline_modal';
                    modal.style = 'display:none;position:fixed;top:10%;left:50%;transform:translateX(-50%);background:#fff;padding:20px;border:1px solid #ccc;z-index:10000;max-width:800px;width:90%;box-shadow:0 6px 24px rgba(0,0,0,0.2);';
                    modal.innerHTML = `
                        <h2 style="margin-top:0">Edit Redirect</h2>
                        <form method="post">
                            <input type="hidden" name="sr_inline_id" id="sr_inline_id">
                            <table class="form-table">
                                <tr><th style="width:160px">Old URL</th><td><input type="text" name="sr_inline_old" id="sr_inline_old" style="width:100%"></td></tr>
                                <tr><th>New URL</th><td><input type="text" name="sr_inline_new" id="sr_inline_new" style="width:100%"></td></tr>
                                <tr><th>Type</th><td>
                                    <select name="sr_inline_type" id="sr_inline_type">
                                        <option value="301">301 Permanent</option>
                                        <option value="302">302 Temporary</option>
                                        <option value="307">307 Temporary</option>
                                        <option value="308">308 Permanent</option>
                                    </select>
                                </td></tr>
                            </table>
                            <p>
                                <input type="submit" name="sr_inline_edit" class="button button-primary" value="Update Redirect">
                                <button type="button" class="button" id="sr_inline_close">Cancel</button>
                            </p>
                        </form>
                    `;
                    document.body.appendChild(modal);
                    document.getElementById('sr_inline_close').addEventListener('click', function(){ modal.style.display='none'; });
                }

                document.getElementById('sr_inline_id').value = this.dataset.id;
                document.getElementById('sr_inline_old').value = this.dataset.old;
                document.getElementById('sr_inline_new').value = this.dataset.new;
                document.getElementById('sr_inline_type').value = this.dataset.type;
                modal.style.display = 'block';
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        });
    });
    </script>
    <?php
} // end sr_admin_page

/* ---------------------------
   Frontend redirect: parse_request (early)
   --------------------------- */
add_action('parse_request', function($wp) {
    global $wpdb;

    $request_uri = $_SERVER['REQUEST_URI'] ?? '/';
    $path = strtok($request_uri, '?');
    $path = rtrim($path, '/');

    $row = $wpdb->get_row($wpdb->prepare(
        "SELECT * FROM ".SR_TABLE." WHERE TRIM(TRAILING '/' FROM old_url) = %s AND active = 1 LIMIT 1",
        $path
    ));

    if ($row) {
        $wpdb->update(SR_TABLE, [
            'hits' => intval($row->hits) + 1,
            'last_used' => current_time('mysql')
        ], ['id' => intval($row->id)]);

        wp_redirect($row->new_url, intval($row->type));
        exit;
    }
}, 1);
