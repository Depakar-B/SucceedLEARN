(function ($) {
  'use strict';

  function showTab(id) {
    var $tabs = $('.plt-tabs .nav-tab');
    var $panels = $('.plt-tab-panel');

    $tabs.removeClass('nav-tab-active');
    $tabs.filter('[data-plt-tab="' + id + '"]').addClass('nav-tab-active');

    $panels.attr('hidden', true);
    $('#plt-tab-' + id).removeAttr('hidden');
  }

  $(function () {
    $('.plt-color').wpColorPicker();

    $('.plt-tabs').on('click', '.nav-tab', function (e) {
      e.preventDefault();
      var id = $(this).data('plt-tab');
      showTab(id);

      if (window.history && window.history.replaceState) {
        window.history.replaceState(null, '', '#' + id);
      }
    });

    var hash = window.location.hash.replace('#', '');
    if (hash && $('#plt-tab-' + hash).length) {
      showTab(hash);
    }
  });
})(jQuery);
