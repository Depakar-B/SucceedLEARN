<?php
/**
 * POSH Act page main markup (AMP).
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<main class="posh-act-page" id="topofthepage" role="main" itemscope itemtype="https://schema.org/Article">
<meta itemprop="headline" content="<?php echo esc_attr( $posh_act_hero_title ); ?>">
<link itemprop="mainEntityOfPage" href="<?php echo esc_url( $posh_act_page_url ); ?>">

<div class="pa-wrap">
	<div class="pa-grid">
		<?php elearnposh_amp_posh_act_render_desktop_sidebar( $posh_act_toc ); ?>
		<div class="pa-main">
			<header class="pa-hero">
				<?php elearnposh_amp_render_breadcrumbs(); ?>
				<p class="pa-hero__kicker"><?php esc_html_e( 'Prevention, Prohibition and Redressal Framework', 'elearnposh-amp' ); ?></p>
				<h1 class="pa-hero__title"><?php echo esc_html( $posh_act_hero_title ); ?></h1>
				<p class="pa-hero__sub"><?php esc_html_e( 'A practical guide to understanding employer responsibilities and building a POSH-compliant workplace.', 'elearnposh-amp' ); ?></p>
				<p class="pa-hero__sub"><?php esc_html_e( 'Explore key legal requirements, implementation steps, and actionable best practices to create a safer, respectful work environment.', 'elearnposh-amp' ); ?></p>
				<div class="pa-hero__cta">
					<p class="pa-hero__cta-text"><?php esc_html_e( '7 Steps to a Safer, POSH-Compliant Workplace', 'elearnposh-amp' ); ?></p>
					<div class="pa-hero__actions">
						<a class="pa-btn pa-btn--primary" href="<?php echo $brochure_url; ?>" target="_top" download><?php esc_html_e( 'Get it Now!', 'elearnposh-amp' ); ?></a>
						<a class="pa-btn pa-btn--secondary" href="<?php echo elearnposh_amp_url( '/contact-us/' ); ?>"><?php esc_html_e( 'Contact Us', 'elearnposh-amp' ); ?></a>
					</div>
				</div>
			</header>
			<?php if ( ! empty( $posh_act_toc ) ) : ?>
			<nav class="pa-mobile-nav" aria-label="<?php echo esc_attr__( 'On-page navigation', 'elearnposh-amp' ); ?>">
				<div class="pa-mobile-nav__card">
					<p class="pa-mobile-nav__title"><?php esc_html_e( 'On this page', 'elearnposh-amp' ); ?></p>
					<?php elearnposh_amp_posh_act_render_quick_chips( $posh_act_toc ); ?>
				</div>
			</nav>
			<?php endif; ?>
			<article class="pa-article" itemprop="articleBody">
				<section class="pa-section">
                    <!-- Compliance to POSH Act Section -->
                    <h2 class="pa-h2" id="poshact-compliancetoposhact">Compliance to POSH Act</h2>
                    <h3 class="pa-h3" id="poshact-dutiesofemployeraccordingtoposhact">Duties of Employer according to POSH Act</h3>
                    <p class="pa-p">
                        The POSH Act holds the employer responsible for ensuring the safety of all employees.
                        To ensure safety of women within workplaces, the POSH Act makes it mandatory for the
                        employer of an organization or a company to do the following:
                    </p>

                    <ul class="pa-list">
                        <li>Provide a safe working environment for all women employees</li>
                        <li>Draft and disseminate an organizational policy against sexual harassment of women at workplace</li>
                        <li>Formulate an Internal Committee if the organization has ten or more employees</li>
                        <li>Display the consequences of sexual harassment and the details of Internal Committee in any conspicuous place in the workplace</li>
                        <li>Organize awareness programs for employees about the provisions of POSH Act. You can take a look at our POSH Employee Awareness
                            eLearning here. Internal Committee members must be trained on their roles and responsibilities. You can take a look at our POSH
                            for IC Members eLearning here
                        </li>
                        <li>Provide necessary facilities and produce any necessary information to the Internal Committee or Local Committee for inquiry of
                            sexual harassment complaints
                        </li>
                        <li>Ensure that the complainant and respondent are present during inquiries</li>
                        <li>Assist the complainant if she wishes to file a complaint with the police</li>
                        <li>Forward an employee’s sexual harassment complaint to the police either because the complainant wishes to, or if the respondent is third-party.</li>
                        <li>Treat sexual harassment as a misconduct under the service rules and initiate action for such misconduct.</li>
                        <li>Ensure that the IC submits the Annual Report to the management and the District Officer. This applies to only organizations that have ten or more employees.</li>
                        <li>If the organization is registered as a company, declare the organization’s POSH Compliance in the Director’s Report.</li>
                    </ul>
                    <div class="pa-media-row">
                        <div class="pa-media-row__copy">
                            <h4 class="pa-h4" id="poshact-constitutesnon-compliance">What constitutes non-compliance to POSH Act?</h4>
                            <p class="pa-p">The employer will be considered non-compliant to the POSH Act if they fail to:</p>
                            <ul class="pa-list">
                                <li>Formulate a POSH Policy for the organization</li>
                                <li>Constitute an Internal Committee</li>
                                <li>Create awareness about POSH among the employees</li>
                                <li>Take action against the respondent of a sexual harassment case as per the recommendations of the Internal Committee
                                </li>

                                <li>Take action against a person for submitting a false complaint of sexual harassment or producing misleading or forged documents
                                </li>
                                <li>File an annual report to the District Officer
                                </li>
                            </ul>
                        </div>
                        <div class="pa-media-row__video"><amp-youtube data-videoid="lCuYbXCwiV4" layout="responsive" width="16" height="9"></amp-youtube></div>
                    </div>

                    <h4 class="pa-h4" id="poshact-penaltyfornon-compliance">Penalty for Non-Compliance of POSH Act</h4>
                    <p class="pa-p">In case the employer of an organization violates or attempts to violate any provision under the POSH Act and Rules, a fine of maximum of ₹50,000 will be imposed.</p>
                    <p class="pa-lead">If the employer is convicted for a repeated offence of non-compliance to POSH Act, the penalty will be:</p>
                    <ul class="pa-list">
                        <li>Twice the punishment that was awarded the first time and/or</li>
                        <li>Cancellation or non-renewal of the business license</li>
                    </ul>
                    <p class="pa-p">The penalty can be very severe if the case reaches the court. Let’s look at a couple of examples:</p>
                    <p class="pa-p">Madhya Pradesh High Court levied a fine of Rs. 50,000 from a hospital for not having an Internal Complaints Committee in 2019. The court also directed the hospital to pay an amount of Rupees 25 lakhs to the complainant for failing to redress her complaint.</p>
                    <p class="pa-p">Reference: Global Health Pvt. Ltd. vs District Panchayat on 16 September, 2019</p>
                    <p class="pa-p">In another judgement, the Madras High Court directed a company in Chennai to pay an amount of Rupees 1.68 crore as damages to an aggrieved woman.</p>
                    <p class="pa-p">Reference: Ms.G vs Isg Novasoft Technologies Ltd, 2014</p>
                    <hr class="pa-divider">

                    <h3 class="pa-h3" id="poshact-formulationoforganization">Formulation of organization’s POSH Policy</h3>
                    <p class="pa-p">
                        One of the mandatory steps for the organization is drafting and disseminating an organizational policy that explains the organization’s stand against sexual harassment.
                        Not having a POSH policy can attract penalty as it is non-compliance to POSH Act.
                    </p>
                    <p class="pa-p">
                        When drafting an organization’s POSH policy, organizations cannot follow a one-size-fits-all approach as the structure of the organization and
                        their culture vary according to their business domain and industry. However, every organization must take care to include the following in the policy:
                    </p>
                    <ul class="pa-list">
                        <li>Definition of sexual harassment.</li>
                        <li>The message that the organization has a zero-tolerance policy towards any act of sexual harassment.</li>
                        <li>Scope and applicability of the policy.</li>
                        <li>Complaining mechanism and the contact details of Internal Committee Members.</li>
                        <li>Redressal process</li>
                        <li>Rights and the protection provided to the complainant, respondent and witnesses in a sexual harassment case.</li>
                        <li>Responsibility of the employer and employees in ensuring safety within the workplace.</li>
                    </ul>
                    <p class="less-priority-title mt-3 mb-1">When drafting the policy, Employers should make sure that:</p>
                    <ul class="pa-list">
                        <li>The policy is drafted in a simple language that can be understood by all employees.</li>
                        <li>There is no ambiguity and important terms are elaborated.</li>
                        <li>The policy is approved by a POSH expert or legal professional.</li>
                        <li>It is easy for employees to access the POSH policy.</li>
                    </ul>
                    <div class="pa-media-row">
                        <div class="pa-media-row__copy">
                            <h4 class="pa-h4" id="poshact-poshpolicybegenderneutral">Can the Organization’s POSH Policy be gender neutral?</h4>
                            <p class="pa-p">
                                Since the POSH Act protects only women against sexual harassment, can the organization’s POSH policy be gender neutral? The answer is yes. Organizations can still have a gender-neutral policy, that allows employee of any gender to file a complaint of sexual harassment with the IC. However, it is to be noted that when there is a sexual harassment complaint from a man or third gender, the powers granted to the Internal Committee will not be applicable. When the Internal Committee handles cases filed by a man or third gender, they can use the powers granted by the organization’s grievance redressal mechanism.
                            </p>
                            <p class="pa-p">
                        If the organization’s policy is not gender-neutral, the policy can include information about how it handles complaints from other genders. For example, a line that says “Refer to the Code of Conduct policy to know the process of accepting and redressing sexual harassment complaints by other genders” can be included in the policy.
                    </p>
                        </div>
                        <div class="pa-media-row__video"><amp-youtube data-videoid="kdt6qDP7m0g" layout="responsive" width="16" height="9"></amp-youtube></div>
                    </div>
                    
                    <hr class="pa-divider">
                    <h3 class="pa-h3" id="poshact-whatisinternalcommittee">What is Internal Committee or Internal Complaints Committee according to POSH Act?</h3>
                    <p class="pa-p">To redress sexual harassment complaints, organizations that have ten or more employees must formulate a team called the Internal Committee (IC).</p>
                    <p class="pa-p">Note: Internal Committee was formerly called as the “Internal Complaints Committee”. The name change from Internal Complaints Committee to Internal Committee was brought forward in “THE REPEALING AND AMENDING ACT, 2016”.</p>
                    <p class="pa-p">The amendment indicates that the IC should not only redress sexual harassment complaints but also take measures to prevent harassment at workplace.</p>
                    <h4 class="pa-h4" id="poshact-constitutionofinternalcommittee">Constitution of Internal Committee</h4>
                    <p class="pa-lead">The employer constitutes the IC in writing and nominates the following members to the IC:</p>
                    <div class="pa-table-wrap">
                    <table class="pa-table">
                        <thead>
                        <tr>
                            <th scope="col">Member</th>
                            <th scope="col">Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Presiding Officer</td>
                            <td>A senior woman employee</td>
                        </tr>
                        <tr>
                            <td>Internal Members</td>
                            <td>Two or more members committed to the cause of women or who have had experience in social work or have legal knowledge</td>
                        </tr>
                        <tr>
                            <td>External Member</td>
                            <td>A third-party from an NGO or association committed to the cause of women or a person familiar with the issues relating to sexual harassment</td>
                        </tr>
                        </tbody>
                    </table>
                    </div>
                    <p class="pa-p">At least half of the IC members should be women.</p>
                    <p class="pa-p">
                        If your organization is looking for an External Member, you can check out our FREE External Member Directory portal.<br>
                        <a href="https://elearnposh.com/em-directory/members/" target="_blank" rel="noopener">Visit the External Member Directory</a>
                    </p>
               
               
                    <p class="pa-p">If you offer External Member services to organizations,you can register in our External Member Directory portal for FREE.</p>
                    <h3 class="pa-h3" id="poshact-shebox">SHe-Box</h3>
                    <h4 class="pa-h4">What is SHe-Box?</h4>
                    <p class="pa-p">SHe-Box stands for Sexual Harassment electronic Box. It is an online complaint management portal created by the Government of India for complaints relating to sexual harassment of women at the workplace.</p>
                    <p class="pa-p">The revamped SHe-Box portal was launched on 29 August 2024 as a centralised platform for registering and monitoring complaints of workplace sexual harassment. It also acts as a repository of Internal Committee and Local Committee information across government and private workplaces.</p>
                    <div class="pa-shebox-promo">
                        <div class="pa-shebox-promo__content">
                            <p class="pa-shebox-promo__eyebrow">SHe-Box Portal Guide</p>
                            <p class="pa-shebox-promo__text">Learn how to file complaints, register your organisation, appoint a nodal officer, understand state-wise registration requirements, and meet employer responsibilities.</p>
                            <ul class="pa-shebox-promo__topics" aria-label="<?php echo esc_attr__( 'Topics covered in the SHe-Box guide', 'elearnposh-amp' ); ?>">
                                <li>File complaints</li>
                                <li>Register organisation</li>
                                <li>Appoint nodal officer</li>
                                <li>State-wise registration</li>
                                <li>Employer responsibilities</li>
                            </ul>
                            <a class="pa-shebox-promo__cta" href="<?php echo esc_url( $she_box_page_url ); ?>"><?php esc_html_e( 'Read the complete SHe-Box guide', 'elearnposh-amp' ); ?> &rarr;</a>
                        </div>
                    </div>
                    <h4 class="pa-h4">Who is an External Member?</h4>
                    <p class="less-priority-title my-2">The External member performs the following duties:</p>
                    <ul class="pa-list">
                        <li>Help the organization to be POSH compliant.</li>
                        <li>Help in creating awareness of the Act among employees.</li>
                        <li>Answer questions from the employees and IC members about the implementation of the POSH Act at workplace.</li>
                        <li>Supervise the inquiry proceedings of sexual harassment complaints to ensure that inquiries are objective and follow principles of natural justice.</li>
                        <li>Assist the IC members to prepare the minutes of the IC meetings and the inquiry proceedings and</li>
                        <li>Assist the IC members to prepare the Annual Report.</li>
                    </ul>
                    <h4 class="pa-h4">Remuneration for External Member</h4>
                    <p class="pa-p">The External Member is entitled to an allowance for holding the proceedings. This can be discussed by the employer and the External Member. The External Member is also allowed to claim for the reimbursement of the travel costs.</p>
                    <h4 class="pa-h4" id="poshact-internalcommitte">Tenure of Internal Committee</h4>
                    <p class="pa-p">All the members of the Internal Committee can hold their positions for three years from the date of their nomination. The employer will reconstitute the IC after the said period.</p>

                    <div class="pa-media-row">
                        <div class="pa-media-row__copy">
                            <h4 class="pa-h4">Disqualification of an Internal Committee Member</h4>
                            <p class="pa-lead">An IC member can be disqualified from the position before the completion of three years if he/she:</p>
                            <ul class="pa-list">
                                <li>Breaches confidentiality regarding information related to the case, like the details related to the identity of the complainant, witness, or the respondent, information regarding the progress of the inquiry, or the recommendation made by or actions taken by IC.</li>
                                <li>Is convicted of an offence or an inquiry into the offence is pending.</li>
                                <li>Has any pending disciplinary proceedings after found guilty.</li>
                                <li>Has abused any powers to continue in their positions in office which could be against the public interest.</li>
                            </ul>
                            <p class="pa-p">In such case, the member must step down and the employer will fill the vacancy with an individual who possesses the qualification to be in the position.</p>
                        </div>
                        <div class="pa-media-row__video"><amp-youtube data-videoid="D199O3_D0qk" layout="responsive" width="16" height="9"></amp-youtube></div>
                    </div>
                   
                    <hr class="pa-divider">

                    <h3 class="pa-h3" id="poshact-employeeawareness">Employee Awareness under POSH Act</h3>
                    <p class="pa-lead">POSH Act mandates that employers must create POSH awareness for their employees and employees must be made aware of the provisions of POSH Act. POSH awareness is very important as sexual harassment is a sensitive topic and employees must know what is acceptable and what is not in the workplace. It is important that the following topics are covered in the POSH training:</p>
                    <ul class="pa-list">
                        <li>Definition of sexual harassment.</li>
                        <li>The message that the organization has a zero-tolerance policy towards any act of sexual harassment.</li>
                        <li>Scope and applicability of the policy.</li>
                        <li>Complaining mechanism and the contact details of Internal Committee Members Redressal process – formal and informal Rights and the protection provided to the complainant, respondent and witnesses in a sexual harassment case.</li>
                        <li>Responsibility of the employer and employees in ensuring safety within the workplace.</li>
                        <li>Employee and Employer according to POSH Act.</li>
                        <li>Internal Committee, its responsibilities and the details of IC members.</li>
                        <li>Process for filing a sexual harassment complaint.</li>
                        <li>Punishments for sexual harassment.</li>
                        <li>Consequences of filing a false complaint.</li>
                        <li>Difference between an unsubstantiated complaint and a false complaint.</li>
                        <li>Consequences of retaliation.</li>
                        <li>Responsibilities of someone who has witnessed harassment.</li>
                        <li>Responsibilities of employees in preventing sexual harassment in the organization.</li>
                        <li>Twice the punishment that was awarded the first time and/or</li>
                        <li>Cancellation or non-renewal of the business license.</li>
                    </ul>

                    <div class="posh-blog-feature mb-3">
                        <div class="posh-blog-feature-copy">
                            <h4 class="pa-h4" id="poshact-effectiveposhtraining">Features of an Effective POSH Training</h4>
                            <p class="pa-lead">An employer must be careful about the kind of training they choose for employees. “For a training to have a positive impact on the employees and help in preventing sexual harassment at workplace, ”. it must have the following features:</p>
                            <ul class="pa-list">
                                <li>It should be conducted at regular time intervals. Higher the frequency of training, better the retention.</li>
                                <li>The training must include real-life examples and scenarios that are relevant to the industry.</li>
                                <li>The training should not only focus on what is unacceptable in the organization. Employees should also be informed about responsible and respectful behavior.</li>
                                <li>Managers should also be enabled adequately as most times they will be the first the employees might approach.</li>
                                <li>Comprehensive enablement for the IC members with case studies and judgments.</li>
                            </ul>
                            <p class="pa-p">You can check out our comprehensive POSH Awareness Trainings for staff, managers and IC Members, here.</p>
                        </div>

                        <article class="posh-blog-feature-card">
                            <amp-img src="https://elearnposh.com/wp-content/uploads/2020/04/WHAT-WHY-AND-HOW-1-1024x576.jpg" alt="POSH Awareness Training: The What, Why and How article cover" width="600" height="400" layout="responsive"></amp-img>
                            <div class="posh-blog-feature-body">
                                <h4>POSH Awareness Training: The What, Why and How</h4>
                                <p>Learn what POSH training covers, why it matters, and how to deliver effective awareness programs.....</p>
                                <a href="https://elearnposh.com/posh-awareness-training-the-what-why-and-how/" class="posh-blog-feature-btn" target="_blank" rel="noopener">Read More</a>
                            </div>
                        </article>
                    </div>
               
                    <hr class="pa-divider">

                    <h3 class="pa-h3" id="poshact-submissionofannualreport">Submission of Annual Report</h3>
                    <p class="pa-lead">POSH Act mandates that every organization that has ten or more employees should submit two reports every year:</p>
                    <ul class="pa-list">
                        <li>The Annual Report submitted by the Internal Committee to the Employer and the District officer.</li>
                        <li>Directors’ Report to the ROC (if the organization is a Private Limited or Public Limited Company).</li>
                    </ul>
                    <h4 class="pa-h4" id="poshact-annualreportsubmittedbyic">Annual Report submitted by the Internal Committee to the Employer and the District officer</h4>
                    <p class="pa-lead">Section 21(1) of the POSH Act states:</p>
                    <div class="highlighter-box">
                        <p class="m-0 text">
                            “21. Committee to submit annual report.— (1) The Internal Committee or the Local Committee, as the case may be, shall in each calendar year prepare, in such form and at such time
                            as may be prescribed, an annual report and submit the same to the employer and the District Officer.”
                        </p>
                    </div>
                    <p class="less-priority-title mt-3 mb-2">The report should contain the following information:</p>
                    <ul class="pa-list">
                        <li>Number of sexual harassment complaints filed in the year.</li>
                        <li>Number of complaints disposed of</li>
                        <li>Number of cases pending for resolution for more than ninety days.</li>
                        <li>Nature of the action(s) taken by the employer or the district officer and</li>
                        <li>Number of workshops/awareness programs conducted by the employer to increase awareness about sexual harassment at workplace.
                        </li>
                    </ul>
                    <p class="pa-p">
                        The POSH Act does not mention a deadline to file the report. However, it is ideal to submit the report for a calendar year by 31st January of the following year.
                        The District Officer will prepare a brief report and forward it to the State Government after receiving reports from organizations and the LC.
                    </p>

                    <h4 class="pa-h4" id="poshact-directorreporttoroc">Directors’ Report to the ROC</h4>
                    <p class="pa-lead">Section 22 of the POSH Act speaks about the employer submitting information in annual report.</p>
                    <div class="highlighter-box">
                        <p class="m-0 text">
                            “22. Employer to include information in annual report.— The employer shall include in its report the number or cases filed, if any, and their disposal
                            under this Act in the annual report of his organisation or where no such report is required to be prepared, intimate such number of cases, if any, to the District Officer.”  
                        </p>
                    </div>
                    <p class="content-property my-2">
                        This report is the organizational annual report filed by the employer every financial year. If the organization is obligated to file the Directors’ report every year, the employer
                        should include the number of sexual harassment cases filed in a year and their disposal in the report.
                    </p>
                    <p class="pa-p">
                        In addition to what the POSH Act mandates, the Ministry of Corporate Affairs amended the Companies (Accounts) Rules 2014. The amendment mandates organizations to make a statement
                        in the Director’s Report that the organization is compliant to the POSH Act. This applies to all organizations registered under ROC except small companies and one person companies as defined by Companies Act.
                    </p>

                    <h3 class="pa-h3" id="poshact-whoisthedistrictofficer">Who is the District Officer?</h3>
                    <p class="pa-p">
                        The POSH Act states that every State Government shall notify a District Magistrate, Additional District Magistrate, Collector or Deputy Collector as the District Officer. The District Officer is responsible
                        to discharge their duties under the Act at the district level. Section 20 of the POSH Act lays down the responsibilities of the District Officer:
                    </p>
                    <div class="pa-callout">
                        <ul class="pa-list">
                            <li>Monitor the timely submission of reports by the Local Committee and</li>
                            <li>Take measures to engage NGOs for creating awareness on sexual harassment and the rights of women.</li>
                        </ul>
                    </div>
                    <p class="less-priority-title mt-3 mb-2">District Officer also has the following additional responsibilities:</p>
                    <ul class="pa-list">
                        <li>Forwarding a brief report on the annual reports submitted by every employer in his/her jurisdiction.</li>
                        <li>Formulating a Local Committee in the district.</li>
                        <li>Designating a nodal officer for every block, taluka and tehsil in rural or tribal area and ward or municipality in the urban area. This nodal officer will receive complaints and forward it to the Local Committee.</li>
                        <li>Acting upon the recommendations of the Local Committee after the inquiry of a case.</li>
                    </ul>
				</section>
				<section class="pa-section">
                    <!-- Definition -->
                    <h2 class="pa-h2" id="poshact-definitions">Definitions</h2>
                    <h3 class="pa-h3" id="poshact-sexualharassment">How is sexual harassment defined under POSH Act?</h3>
                    <p class="pa-lead">
                        According to the POSH Act, any of the following unwelcome behaviors is defined as sexual harassment:
                    </p>
                    <ul class="pa-list">
                        <li>Physical contact and advances.</li>
                        <li>Demand or request for sexual favors.</li>
                        <li>Making sexually colored remarks.</li>
                        <li>Showing pornography.</li>
                        <li>Any other unwelcome physical, verbal or non-verbal conduct of sexual nature.</li>
                    </ul>
                    <p class="pa-lead">It is also considered sexual harassment if any woman employee is subjected to any of the following:</p>
                    <ul class="pa-list">
                        <li>Promise of preferential treatment in the employment in return of a sexual favor.</li>
                        <li>Threat of detrimental treatment in the employment for denying a sexual favor.</li>
                        <li>Threat about the present or future employment status for denying sexual favor.</li>
                        <li>Any behavior/act with sexual nature that interferes with an employee’s work or creates an intimidating, offensive or hostile work environment.</li>
                        <li>Any kind of humiliating treatment that relates to any behavior that has explicit or implicit sexual undertones. The kind of treatment that is likely to affect the health or safety of the woman employee.</li>
                    </ul>
                    <hr class="pa-divider">

                    <h3 class="pa-h3" id="poshact-workplalce">What is Workplace according to POSH Act?</h3>
                    <p class="pa-p">
                        The POSH Act defines workplace as <b>“any place visited by the employee arising out of or during the course of employment including the transportation facilities provided by the employer”</b>. This includes:
                    </p>
                    <ul class="pa-list">
                        <li>The premises of any establishment owned and run by the government or private parties.</li>
                        <li>Any place owned by individuals or self-employed workers and engaged in production and sale of good or providing service.</li>
                        <li>A dwelling place arranged by the employer, like house, hostels and hotel rooms.</li>
                        <li>Any kind of office sponsored entertainment, like team dinner or outing.</li>
                        <li>All virtual or online platforms used by employees to connect with each other during or outside work hours and</li>
                        <li>Any place the employees are at when working remotely.</li>
                    </ul>
                    <h4 class="pa-h4" id="poshact-homeconsideredworkplace">Is Home Considered Workplace When Working Remotely?</h4>
                    <p class="pa-p">
                        With working from home becoming the new normal due to the Covid impact, Corporate India has seen a shift in the concept of workplace. Since the majority of the workforce started working from home,
                        the boundary between office and home is practically non-existent. Is home considered as a workplace? Yes!
                    </p>
                    <p class="pa-p">
                        POSH Act recognizes home as workplace because it is a “place visited by the employee arising out of during the course of employment”. This means if employee is subjected to sexual harassment when
                        working from home, her organization is obligated to redress the grievance.
                    </p>
                    <p class="pa-p">
                        This is significant because there was an increase in sexual harassment cases when people started working remotely. Stalking, sharing of inappropriate images and videos, Zoom bombing, sexist or
                        derogatory WhatsApp messages, pressurizing lady employees to come on video calls are some of the many ways employees were subjected to harassment when working from home.
                    </p>
                    <p class="pa-p">
                        Courts in India have also made observations emphasizing that home of the employee is covered under workplace when working from home.
                    </p>
                    <p class="pa-lead">
                        In the case of Saurabh Kumar Mallick v. Comptroller & Auditor General of India, Delhi High Court held the following:
                    </p>
                    <div class="pa-callout">
                        <p class="m-0 text">
                            “It is imperative to take into consideration the recent trend which has emerged with the advent of computer and internet technology
                            and the advancement of information technology.  A person can interact or do a business conference with another person while sitting
                            in some other country by way of video conferencing. It has also become a trend that the office is being run by CEOs from their residence.
                            In a case like this, if such an officer indulges in an act of sexual harassment with an employee, say, his private secretary, it would
                            not be open for him to say that he had not committed the act at ‘workplace’ but at his ‘residence’ and get away with the same.”
                        </p>
                    </div>
                    <hr class="pa-divider">

                    <h4 class="pa-h4" id="poshact-employeracctoposhact">Who is an Employer according to POSH Act?</h4>
                    <p class="less-priority-title mt-2">
                        An employer is any person discharging contractual obligations with respect to his or her employees. As per the POSH Act, here are the three definitions of employer:
                    </p>
                    <div class="pa-def-cards">
                        <article class="pa-def-card">
                            <p class="pa-def-card__title">For a Government or a local authority</p>
                            <p class="pa-def-card__text">An employer for a dwelling place or house is <span class="pa-def-card__quote">“head of the department, organization, undertaking, establishment, enterprise, institution, office, branch or unit specified by the Government or the appropriate local authority.”</span></p>
                        </article>
                        <article class="pa-def-card">
                            <p class="pa-def-card__title">For a dwelling place or house</p>
                            <p class="pa-def-card__text">An employer is the <span class="pa-def-card__quote">“a person or a household who employs or benefits from the employment of domestic worker, irrespective of the number, time period or type of such worker employed, or the nature of the employment or activities performed by the domestic worker.”</span></p>
                        </article>
                        <article class="pa-def-card">
                            <p class="pa-def-card__title">For any other establishment</p>
                            <p class="pa-def-card__text">Employer is any person responsible for the management, supervision and control of the workplace. This includes the person or board or committee responsible for formulation and administration of policies for such organization.</p>
                        </article>
                    </div>
				</section>
				<section class="pa-section">
                        <!-- Features -->
                    <h2 class="pa-h2" id="poshact-features">Features</h2>
                    <h3 class="pa-h3" id="poshact-scopeofposhact">What is the scope of POSH Act?</h3>
                    <p class="pa-p">
                        The Sexual Harassment of Women at Workplace (Prevention, Prohibition and Redressal) Act, 2013 was enacted as an attempt to ensure a woman’s right to live with dignity and the right to carry out any occupation. The POSH Act provides
                        protection against sexual harassment for every woman who has visited a workplace. That means, a woman can complain if she faces sexual harassment in her workplace or a workplace of another person.
                    </p>
                    <p class="pa-p">
                        POSH Act is also applicable to every public/private establishment that carries out any commercial, vocational, educational, entertainment, industrial or financial activities in the whole of India. This includes organized and
                        unorganized sector and non-governmental organizations. Yes, the maid is also protected by the POSH Act.
                    </p>
                    <hr class="pa-divider">

                    <h3 class="pa-h3" id="poshact-genderneutrallocalcommittee">POSH Act and Gender-Neutrality</h3>
                    <p class="pa-p">
                        Many ask, is the POSH Act gender neutral? The answer is no. As per the POSH Act, only women can file a complaint of sexual harassment. It is to be noted that the POSH Act allows an aggrieved woman to file a sexual harassment
                        complaint against another woman.
                    </p>
                    <p class="pa-lead">
                        In a landmark judgment for the case “Dr. Malabika Bhattacharjee vs. Internal Complaints Committee, Vivekananda College”, the Honorable Justice Sabyasachi Bhattacharyya of the High Court of Calcutta remarked:
                    </p>
                    <div class="pa-callout">
                        <p class="">
                            "There is nothing in Section 9 of the 2013 Act to preclude a same-gender complaint under the Act."
                        </p>
                        <p>
                            “...it might seem a bit odd at the first that people of the same gender complain of sexual harassment against each other, it is not improbable, particularly in the context of the dynamic mode which the
                            Indian society is adopting currently, even debating the issue as to whether same-gender marriages may be legalized."
                        </p>
                        <p class="m-0">
                            “If section 3(2) is looked into, it is seen that the acts contemplated therein can be perpetrated by the members of any gender, even inter se“.
                        </p>
                    </div>
                    <hr class="pa-divider">

                    <h3 class="pa-h3" id="poshact-localcomplaintscommittee">What is Local Committee or Local Complaints Committee according to POSH Act?</h3>
                    <p class="pa-p">
                        Local Committee (LC) is a body formulated according to the Section 6 of the POSH Act which states that the District Officer must form the Local Complaints Committee for the respective district.
                    </p>
                    <p class="pa-lead">
                        LC will receive and redress complaints of sexual harassment from:
                    </p>
                    <ul class="pa-list">
                        <li>Employees of organizations that do not have an Internal Committee because the organization has less than ten employees.</li>
                        <li>Women working in unorganized sector (like housemaids, cooks)</li>
                        <li>Employees from organization which has an Internal Committee if the sexual harassment complaint is against the employer itself.</li>
                    </ul>
                    <div class="pa-name-change-note">
                        <p class="pa-name-change-note__text">Note: Local Committee was formerly called as the “Local Complaints Committee”. The name change from Local Complaints Committee to Local Committee was brought forward in “THE REPEALING AND AMENDING ACT, 2016”.</p>
                    </div>
                    <h4 class="pa-h4" id="poshact-constitutionoflocalcommittee">Constitution of Local Committee</h4>
                    <p class="pa-lead">The District Officer will nominate the following members to the Local Committee:</p>
                    <div class="pa-table-wrap">
                    <table class="pa-table">
                        <thead>
                        <tr>
                            <th scope="col">Member</th>
                            <th scope="col">Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Chairperson</td>
                            <td>An eminent woman in the field of social work and committed to the cause of women.</td>
                        </tr>
                        <tr>
                            <td>Members</td>
                            <td>A woman working in block, taluka or tehsil or ward or municipality in the district.</td>
                        </tr>
                        <tr>
                            <td>Two Members</td>
                            <td>From NGOs or associations committed to the cause of women or a person familiar with the issues relating to sexual harassment. One of them should be a woman.</td>
                        </tr>
                        <tr>
                            <td>Ex-officio member</td>
                            <td>The officer dealing with the social welfare or women and child development in the district will be a member of the LC ex officio, or by default.</td>
                        </tr>
                        </tbody>
                    </table>
                    </div>
                    <p class="pa-lead">The District officer will keep the following in mind when constituting the LC:</p>
                    <ul class="pa-list">
                        <li>One of the members should, preferably, have a background in law or legal knowledge.</li>
                        <li>At least one of the nominees will be a woman belonging to the Scheduled Castes, Scheduled Tribes or the Other Backward Classes or minority community.</li>
                    </ul>
                    <h4 class="pa-h4" id="poshact-jurisdictionoflocalcommittee">Jurisdiction of Local Committee</h4>
                    <p class="pa-p">The jurisdiction of LC extends to the areas of the district where it is constituted.</p>
                    <h4 class="pa-h4" id="poshact-remunerationlocalcommitteemembers">Remuneration for Local Committee Members</h4>
                    <p class="pa-p">All the Local Committee members are entitled to an allowance for holding the proceedings. The District Officer is responsible for this payment.</p>
                    <h4 class="pa-h4" id="poshact-tenureanddisqualification">Tenure and Disqualification of Local Committee Member</h4>
                    <p class="pa-lead">
                        Every LC member will hold the office for a period of three years since the date of their appointment. However, an LC member can be removed from the position before their term if he/she:
                    </p>
                    <ul class="pa-list">
                        <li>Breaches confidentiality regarding information related to the case, such as the details related to the identity of the complainant, witness, or the respondent, information regarding the progress of the investigation, or the recommendation made by or actions taken by IC.
                        </li>
                        <li>Is convicted of an offence or an inquiry into the offence is pending.</li>
                        <li>Has any pending disciplinary proceedings after found guilty.</li>
                        <li>Has abused any powers to continue in their positions in office which could be against the public interest.</li>
                    </ul>
				</section>
				<section class="pa-section">
                         <!-- Complaining Procedure -->
                    <h2 class="pa-h2" id="poshact-complainingprocedure">Complaining Procedure</h2>
                    <h3 class="pa-h3" id="poshact-complainaboutsexualharassment">Who can complain about sexual harassment under POSH Act?</h3>
                    <p class="pa-lead">
                        Anybody can become a victim of sexual harassment. As per the POSH Act, any aggrieved woman who is:
                    </p>
                    <ul class="pa-list">
                        <li>An employee</li>
                        <li>A visitor to the office (example, has come for an interview).</li>
                        <li>Client or a Vendor</li>
                        <li>Housekeeping and maintenance staff</li>
                        <li>Intern</li>
                        <li>Volunteer</li>
                        <li>Temporary worker</li>
                    </ul>
                    <p class="pa-p">
                        has the right to file a complaint of sexual harassment with the employer. It is important to note that the aggrieved woman need not be an employee of an organization to file a sexual harassment complaint.
                    </p>
                    <h3 class="pa-h3" id="poshact-complaint-faq"><span class="pa-faq-section-label">FAQ</span></h3>
                    <amp-accordion id="poshact-complaint-faq-accordion" class="pa-faq-accordion" animate expand-single-section disable-session-states>
                        <section expanded>
                            <h3 class="pa-faq-q" id="poshact-whoiscomplainant"><span class="pa-faq-q-text">Who is the Complainant?</span><span class="pa-faq-q-arrow" aria-hidden="true">▾</span></h3>
                            <div class="pa-faq-a">
                                <p class="pa-p">POSH Act defines the Complainant as the person who filed a written complainant of sexual harassment before the IC/LC. Either the aggrieved woman or any other person who files a complaint on her behalf can be the complainant.</p>
                            </div>
                        </section>
                        <section>
                            <h3 class="pa-faq-q" id="poshact-whoisrespondent"><span class="pa-faq-q-text">Who is the Respondent?</span><span class="pa-faq-q-arrow" aria-hidden="true">▾</span></h3>
                            <div class="pa-faq-a">
                                <p class="pa-p">The person against whom a complaint is filed is called the respondent. The respondent can be an employee of an organization or a third-party.</p>
                            </div>
                        </section>
                        <section>
                            <h3 class="pa-faq-q" id="poshact-Lodgingsexualharassmentcomplaint"><span class="pa-faq-q-text">Lodging A Sexual Harassment Complaint</span><span class="pa-faq-q-arrow" aria-hidden="true">▾</span></h3>
                            <div class="pa-faq-a">
                                <p class="pa-p">The complainant should submit a written complaint to the IC/LC.</p>
                            </div>
                        </section>
                        <section>
                            <h3 class="pa-faq-q" id="poshact-conductinquiryintoanonymouscomplaints"><span class="pa-faq-q-text">Can the IC/LC conduct inquiry into anonymous complaints?</span><span class="pa-faq-q-arrow" aria-hidden="true">▾</span></h3>
                            <div class="pa-faq-a">
                                <p class="pa-p">The POSH Act does not explicitly say anything about anonymous complaints. This simply means the LC/IC does not have the authority to inquire into anonymous complaints.</p>
                            </div>
                        </section>
                        <section>
                            <h3 class="pa-faq-q" id="poshact-deadlinetofilecomplaint"><span class="pa-faq-q-text">Deadline to file a Complaint</span><span class="pa-faq-q-arrow" aria-hidden="true">▾</span></h3>
                            <div class="pa-faq-a">
                                <p class="pa-p">The complainant can file a complaint within three months from the incident, or in case of a series of incidents, within three months from the last incident. The IC/LC can use its discretion to extend this timeline to another three months if the reason for delay of filing the complaint is valid.</p>
                            </div>
                        </section>
                        <section>
                            <h3 class="pa-faq-q" id="poshact-policecomplaint"><span class="pa-faq-q-text">Can the complainant register a police complaint?</span><span class="pa-faq-q-arrow" aria-hidden="true">▾</span></h3>
                            <div class="pa-faq-a">
                                <p class="pa-p">Apart from registering a complaint with the Internal Committee or the Local Committee, POSH Act allows the aggrieved woman to file a police complaint also.</p>
                            </div>
                        </section>
                    </amp-accordion>
                    <div class="pa-callout">
                        <p class="m-0">
                            Section 19 (g) of the POSH Act states that the employer must “provide assistance to the woman if she so chooses to file a complaint in relation to the offence under the Indian Penal Code (45 of 1860) or any other law for the time being in force;
                        </p>
                    </div>
				</section>
				<section class="pa-section">
                    <!-- Redressal Process -->
                    <h2 class="pa-h2" id="poshact-redressalprocess">Redressal Process</h2>
                    <h3 class="pa-h3" id="poshact-conciliation">Conciliation</h3>
                    <p class="pa-lead">
                        After submitting the complaint, complainant can request the LC/IC to settle the matter through conciliation. The IC/LC will communicate the complainant’s desire for conciliation to the respondent. If the respondent agrees for
                        conciliation, the IC/LC can initiate for conciliation. The features of conciliation are:
                    </p>
                    <ul class="pa-list">
                        <li>The IC must document the settlement and share the copy of the report with the employer, complainant and the respondent.</li>
                        <li>Monetary settlement should not be the basis for conciliation.</li>
                        <li>Once a complaint is settled via conciliation, no inquiry will be initiated on the same.</li>
                    </ul>
                    <hr class="pa-divider">

                    <h3 class="pa-h3" id="poshact-respondentfromanotherorganization">What should the IC do if the respondent is from another organization or a third-party?</h3>
                    <p class="pa-p">
                        If the respondent is an employee of other organization, the IC will forward the complaint to the IC of the respondent’s organization and in case of a third-party, IC will help the complainant in filing a police complaint.
                    </p>
                    <hr class="pa-divider">

                    <h3 class="pa-h3" id="poshact-inquiry">Inquiry</h3>
                    <p class="pa-lead">
                        The IC/LC will initiate inquiry into the complaint if:
                    </p>
                    <ul class="pa-list">
                        <li>The complainant did not request for conciliation.</li>
                        <li>The aggrieved woman informs the IC/LC that the respondent did not comply to any of the terms or conditions arrived at during conciliation or</li>
                        <li>The respondent does not agree for conciliation.</li>
                    </ul>

                    <h4 class="pa-h4">Inquiry Process</h4>
                    <div class="pa-process-steps">
                        <article class="pa-process-step">
                            <div class="pa-process-step__card">
                                <span class="pa-process-step__num" aria-hidden="true">1</span>
                                <p class="pa-p pa-process-step__text">The complainant will submit six copies of written complaint with supporting documents and names and addresses of the witness.</p>
                            </div>
                        </article>
                        <article class="pa-process-step">
                            <div class="pa-process-step__card">
                                <span class="pa-process-step__num" aria-hidden="true">2</span>
                                <p class="pa-p pa-process-step__text">IC/LC will send one copy of the complaint to the respondent within 7 working days.</p>
                            </div>
                        </article>
                        <article class="pa-process-step">
                            <div class="pa-process-step__card">
                                <span class="pa-process-step__num" aria-hidden="true">3</span>
                                <p class="pa-p pa-process-step__text">The respondent will submit his/her response to the IC/LC with supporting documents and list of witnesses within 10 working days.</p>
                            </div>
                        </article>
                        <article class="pa-process-step">
                            <div class="pa-process-step__card">
                                <span class="pa-process-step__num" aria-hidden="true">4</span>
                                <p class="pa-p pa-process-step__text">The IC/LC will begin the inquiry and finish it within 90 days. Every hearing of the inquiry will have a minimum of three IC/LC members including the Presiding Officer of IC or Chairperson of LC. The Committee will also ensure to follow the principles of natural justice during inquiry.</p>
                            </div>
                        </article>
                        <article class="pa-process-step">
                            <div class="pa-process-step__card">
                                <span class="pa-process-step__num" aria-hidden="true">5</span>
                                <p class="pa-p pa-process-step__text">If the complainant or the respondent does not appear for three consecutive hearings without a valid reason, the IC/LC can terminate the inquiry and pass an order ex-parte (without hearing to both the sides completely). Before terminating the complaint in such a manner, the IC/LC will give a notice of fifteen days to the parties.</p>
                            </div>
                        </article>
                        <article class="pa-process-step">
                            <div class="pa-process-step__card">
                                <span class="pa-process-step__num" aria-hidden="true">6</span>
                                <p class="pa-p pa-process-step__text">It is to be noted that neither of the parties can bring their lawyers to represent them in the inquiry conducted by the LC/IC.</p>
                            </div>
                        </article>
                    </div>

                    <h4 class="pa-h4">Timelines to be followed during Inquiry</h4>
                    <div class="pa-callout">
                        <p class="text-white h4">
                            IC/LC have the powers of Civil Court
                        </p>
                        <p class="content-property text-white mb-2">
                            For the purpose of conducting inquiry, IC/LC is vested with the powers of the Civil Court. Section 11 (3) of the POSH Act states: “For the purpose of making an inquiry under sub-section (1), the Internal Committee or the
                            Local Committee, as the case may be, shall have the same powers as are vested in a civil court under the Code of Civil Procedure, 1908 (5 of 1908) when trying a suit in respect of the following matters, namely:—
                        </p>
                        <ul class="pa-list">
                            <li>summoning and enforcing the attendance of any person and examining him on oath;
                            </li>
                            <li>requiring the discovery and production of documents; and</li>
                            <li>any other matter which may be prescribed.</li>
                        </ul>
                    </div>

                    <h4 class="pa-h4">Interim Reliefs for the Aggrieved under POSH Act</h4>
                    <p class="pa-lead">
                        If the aggrieved experiences any difficulty or discomfort when the case is under inquiry, she can inform this to the IC/LC. The IC/LC will recommend the employer to provide any of the following interim relief:
                    </p>
                    <ul class="pa-list">
                        <li>Transfer the aggrieved woman or the respondent to any other location;
                        </li>
                        <li>Grant leave to the aggrieved woman up to a period of three months (this leave is in addition to the leave she is already entitled to)</li>
                        <li>Restrain the respondent from reporting on the work performances of the aggrieved woman or writing her confidential report, and assign the same to another officer.</li>
                        <li>In case of an educational institution, restrain the respondent from supervising any academic activity of the aggrieved woman.</li>
                    </ul>
                    <h4 class="pa-h4">Conducting Inquiries in the New Normal</h4>
                    <p class="pa-p">
                        Conducting inquiries when the employees are working remotely, posts several challenges. Example: virtual meetings, collection of evidence, maintaining confidentiality. We have put together a comprehensive guide to this.
                    </p>
                    <div class="posh-blog-cards mb-2">
                        <div class="posh-blog-cards-grid posh-blog-cards-grid--two">
                            <article class="posh-blog-feature-card">
                                <amp-img src="https://elearnposh.com/wp-content/uploads/2020/07/POSH-Compliance.jpg" alt="Comprehensive Guide to POSH Compliance in the New Normal article cover" width="600" height="400" layout="responsive"></amp-img>
                                <div class="posh-blog-feature-body">
                                    <h4>Comprehensive Guide to POSH Compliance in the New Normal</h4>
                                    <p>Enough said about the effect of the pandemic in our workplaces. Workplace now has a new definition. With this fundamental change in the definition.....</p>
                                    <a href="https://elearnposh.com/guide-to-posh-compliance-in-the-new-normal/" class="posh-blog-feature-btn" target="_blank" rel="noopener">Read More</a>
                                </div>
                            </article>

                            <article class="posh-blog-feature-card">
                                <amp-img src="https://elearnposh.com/wp-content/uploads/2020/07/Fighting-Sexual-Harassment-during-the-New-Normal-1.jpg" alt="Fighting Sexual Harassment during the New Normal article cover" width="600" height="400" layout="responsive"></amp-img>
                                <div class="posh-blog-feature-body">
                                    <h4>Fighting Sexual Harassment during the New Normal</h4>
                                    <p>When corporate India has embraced work from home, thanks to the Covid-19 and resulting lockdown, sexual harassment has embraced virtual forms.</p>
                                    <a href="https://elearnposh.com/fighting-sexual-harassment-during-the-new-normal/" class="posh-blog-feature-btn" target="_blank" rel="noopener">Read More</a>
                                </div>
                            </article>
                        </div>
                    </div>
                    <hr class="pa-divider">

                    <h3 class="pa-h3" id="poshact-inquiryreportbyinternalcommittee">Inquiry Report by the Internal Committee</h3>
                    <div class="highlighter-box">
                        <p class="mb-0">
                            Section 13 (1) of the POSH Act states “On the completion of an inquiry under this Act, the Internal Committee or the Local Committee, as the case may be, shall provide a report of its findings to the employer, or as the case may be, the District Officer within a period of ten days from the date of completion of the inquiry and such report be made available to the concerned parties.”
                        </p>
                    </div>
                    <h4 class="pa-h4" id="poshact-draftinginquiryreport">Drafting the Inquiry Report</h4>
                    <p class="pa-lead">
                        Drafting an inquiry report is one of the most important tasks carried out by the Internal Committee. While drafting an inquiry report, Internal Committee should keep the following things in mind:
                    </p>
                    <ul class="pa-list">
                        <li>All documents submitted by both parties and witnesses to substantiate their respective claims should be brought on record.
                        </li>
                        <li>All the oral testimonies of the complainant, respondent, and witnesses should be brought on record.</li>
                        <li>Collection of evidence and their analysis should be documented.</li>
                        <li>Details of circumstantial evidence (if applicable) should be documented.</li>
                        <li>All the timeline of events should be documented as clearly as possible.</li>
                    </ul>
                    <h4 class="pa-h4"><i>What should the Inquiry Report contain?</i></h4>
                    <p class="less-priority-title mb-1">1. Title Page</p>
                    <p class="mb-2">The title page of the inquiry report can have the following details:</p>
                    <ul class="pa-list">
                        <li>Names of the parties.</li>
                        <li>Designations of the parties.</li>
                        <li>Details of their reporting managers.</li>
                        <li>Parties’ tenure in the organization.</li>
                        <li>Names and the designations of the Internal Committee (IC) members.</li>
                        <li>Date of receipt of complaint.</li>
                        <li>Date on which the complaint was shared with the respondent.</li>
                        <li>Date of submission of inquiry report.</li>
                        <li>Case number and other reference number (Example: FIR number in case of a police complaint).</li>
                    </ul>
                    <p class="less-priority-title mb-1">2. Inquiry Details</p>
                    <p class="mb-1">This section should capture all the essential details of the case. Care should be taken to document everything in detail. This section should include the following:</p>
                    <ul class="pa-list">
                        <li>Exact nature of the allegation.</li>
                        <li>Details of the complaint (time, place, related documents etc.)</li>
                        <li>Applicability of POSH Act for the complaint.</li>
                        <li>Details of how the Internal Committee (IC) received the complaint.</li>
                        <li>Details of people contacted by the complainant before and after the complaint was filed with the IC.</li>
                        <li>Details of the respondent’s reply.</li>
                        <li>Details of the witnesses and their statements.</li>
                        <li>Details of Evidence collected (documents, mails, chats, timestamps etc.)</li>
                        <li>Details of circumstantial evidence (if any).</li>
                        <li>Details of other employees who are aware or involved in the case.</li>
                    </ul>
                    <p class="less-priority-title mb-1">3. Inquiry Meetings</p>
                    <p class="mb-1">During inquiry, the Internal Committee (IC) will hold several meetings with the complainant, respondent, witnesses and among themselves. This section will capture the details of the inquiry meetings like:</p>
                    <ul class="pa-list">
                        <li>Inquiry Meeting number (Example: Inquiry Meeting 1).</li>
                        <li>Date and time of the meeting.</li>
                        <li>Attendees.</li>
                        <li>Details of examination and cross-examination.</li>
                        <li>Details of the discussion (if the meeting was between the IC members).</li>
                        <li>General Observations (Example: rude or intimidating behavior by the complainant or respondent).</li>
                        <li>Meeting Summary.</li>
                    </ul>
                    <p class="less-priority-title mb-1">4. Conciliation</p>
                    <p class="pa-p">
                        If the complainant requested for conciliation, the details of the conciliation procedure should be clearly documented in this section. It is important to add a declaration that there was no monetary settlement
                        as part of the Conciliation process. If the complainant did not request for conciliation, the same can be mentioned in this section.
                    </p>
                    <p class="less-priority-title mb-1">5. Findings & Conclusion</p>
                    <p class="pa-p">
                        This section is very important as it captures the findings of the entire inquiry. If either of the two parties go to court for an appeal, details provided in this section will carry lot of significance. Therefore,
                        this should contain details of how the principles of natural justice were adhered to during the inquiry process and the reasons why the IC upheld or dismissed the allegations made by the Complainant. The reasons should be elaborated in detail.
                    </p>
                    <p class="less-priority-title mb-1">6. Recommendations to the Employer</p>
                    <p class="pa-p">
                        This section should capture the disciplinary actions recommended against the respondent. Disciplinary actions can also be recommended against the complainant if it is proved that the complainant had filed a false complaint. Details of Rehabilitation
                        for the aggrieved should also be included in this section. If the allegation against the Respondent is not proved, the same should be mentioned in this section with a statement that no further action on this complaint is required.    
                    </p>
                    <p class="less-priority-title mb-1">7. Declaration by the IC</p>
                    <p class="pa-p">It is recommended for the IC to add a declaration. The declaration can contain the following points.</p>
                    <ul class="pa-list">
                        <li>Copy of this report is sent to the complainant, respondent, and the employer.</li>
                        <li>The Inquiry Report will always be treated as confidential and will not be available for viewing unless required by the law.</li>
                        <li>The undersigned have strictly adhered to the provisions of the Sexual Harassment of Women at Workplace (Prevention, Prohibition and Redressal) Act 2013.</li>
                        <li>The IC has documented the reasons for their recommendations.</li>
                        <li>None of the IC members have any personal interest in the matter.</li>
                    </ul>
                    <p class="less-priority-title mb-1">8. Signature of the IC Members</p>
                    <p class="pa-p">
                        The inquiry report should end with the signatures of the Presiding Officer, IC Members and External Member.
                    </p>
                    <h4 class="pa-h4">Recommendations by the IC to the Employer</h4>
                    <p class="pa-lead">If the respondent is found guilty</p>
                    <p class="pa-p">
                        If the allegation against the respondent is proved, the IC can recommend actions against the respondent.
                        The IC should keep the following in mind when writing the recommendations.
                    </p>
                    <ul class="pa-list">
                        <li>Severity of the misconduct.</li>
                        <li>Respondent’s past track record.</li>
                        <li>Designation and stature of the respondent.</li>
                        <li>Impact of the recommended action on the respondent and the organization.</li>
                    </ul>
                    <p class="pa-lead">
                        As per the POSH Act, IC has the powers of a civil court and it can award punishments mentioned in the service rules of the organization. If no service rules
                        exist, based on the severity of the offence, IC can make recommendations like:
                    </p>
                    <ul class="pa-list">
                        <li>Written apology</li>
                        <li>Warning</li>
                        <li>Reprimand/Censure</li>
                        <li>Withholding of promotion or pay rise</li>
                        <li>Deduction of compensation payable to the aggrieved woman from the salary of the respondent</li>
                        <li>Termination</li>
                        <li>Community service or counseling</li>
                    </ul>
                    <p class="pa-lead">If the complainant is found guilty of filing a False Complaint</p>
                    <p class="pa-p">
                        Filing a false complaint is punishable according to the POSH Act. If it is proved that the complainant has filed a complaint with malicious intent, or with the knowledge that the
                        complaint is false, the IC can recommend action against the complainant as prescribed in the service rules of the organization. If service rules do not exist, IC can then award the
                        same recommendations listed above.
                    </p>
                    <div class="pa-callout">
                        <p class="text-white mb-2 h4">
                            Compensation for the Aggrieved Woman
                        </p>
                        <p class="content-property text-white mb-2">
                            Section 15 of the POSH Act speaks about “Determination of Compensation” and provides guidelines for it. POSH Act states that:
                        </p>
                        <p class="content-property text-white mb-2">
                            For the purpose of determining the sums to be paid to the aggrieved woman under clause (ii) of sub-section (3) of section 13, the Internal Committee or the Local Committee, as the case may be, shall have regard to—
                        </p>
                        <ul class="pa-list">
                            <li>The mental trauma, pain, suffering and emotional distress caused to the aggrieved woman.
                            </li>
                            <li>The loss in the career opportunity due to the incident of sexual harassment.</li>
                            <li>Medical expenses incurred by the victim for physical or psychiatric treatment.</li>
                            <li>The income and financial status of the respondent.</li>
                            <li>Feasibility of such payment in lump sum or in instalments</li>
                        </ul>
                    </div>
                    <hr class="pa-divider">

                    <h3 class="pa-h3" id="poshact-falsecomplaints">What does POSH Act say about False Complaints?</h3>
                    <p class="pa-p">POSH Act takes a serious view about false complaints. Section 14 (1) of the POSH Act talks about false complaints and punishment for the same.</p>
                    <div class="pa-callout">
                        <h4 class="sublevel-title-text text-white mb-2" id="poshact-maliciouscomplaint">
                            Punishment for false or malicious complaint and false evidence
                        </h4>
                        <p class="mb-0">
                            Where the Internal Committee or the Local Committee, as the case may be, arrives at a conclusion that the allegation against the respondent is malicious or the aggrieved
                            woman or any other person making the complaint has made the complaint knowing it to be false or the aggrieved woman or any other person making the complaint has produced
                            any forged or misleading document, it may recommend to the employer or the District Officer, as the case may be, to take action against the woman or the person who has
                            made the complaint under sub-section (1) or sub-section (2) of section 9, … in such manner as may be prescribed:”
                        </p>
                    </div>
                    <h4 class="pa-h4" id="poshact-lackofevidence">Lack of Evidence = False Complaint?</h4>
                    <p class="pa-p">
                        POSH Act makes it very clear that mere inability to substantiate a complaint or provide adequate proof will not automatically prove that the complaint was false.
                    </p>
                    <div class="pa-callout">
                        <p class="text-white mb-2 h4">
                            Section 14(1) of the POSH Act states:
                        </p>
                        <p class="mb-0">
                            “Provided that a mere inability to substantiate a complaint or provide adequate proof need not attract action against the complainant under this section”
                        </p>
                    </div>
                    <h4 class="pa-h4" id="poshact-penaltiesforfalsecomplaints">What are the Penalties for False Complaints?</h4>
                    <p class="pa-p">
                        If it is proven that a person has made false complaint, the penalties awarded should be in accordance with the service rules of Organization. In case, no such service rules exist, based on the
                        severity of the complaint, any of the following penalties can be awarded to the guilty:
                    </p>
                    <div class="posh-blog-feature">
                        <div class="posh-blog-feature-copy">
                            <ul class="list content-property me-3 my-2">
                                <li>Written apology</li>
                                <li>Warning</li>
                                <li>Reprimand or Censure</li>
                                <li>Withholding of promotion</li>
                                <li>Withholding of pay rise or increments</li>
                                <li>Terminating the guilty from service</li>
                                <li>Undergoing a counselling session or</li>
                                <li>Carrying out community service</li>
                            </ul>
                            <p class="content-property mb-0">
                                While the POSH Act allows for penalties to the complainant for filing a false complaint, there is no provision for compensation to the respondent.
                            </p>
                        </div>

                        <article class="posh-blog-feature-card">
                            <amp-img src="https://elearnposh.com/wp-content/uploads/2021/05/Filing-False-Complaints-under-POSH-Act-01-2048x1257.jpg" alt="Filing false complaints under POSH Act article cover" width="600" height="400" layout="responsive"></amp-img>
                            <div class="posh-blog-feature-body">
                                <h4>Filing False Complaints under POSH Act, 2013</h4>
                                <p>Understand how false complaints are treated under POSH and what employers.....</p>
                                <a href="https://elearnposh.com/false-complaints/" class="posh-blog-feature-btn" target="_blank" rel="noopener">Read More</a>
                            </div>
                        </article>
                    </div>
				</section>
				<section class="pa-section">
                    <!-- Confidentiality -->
                    <h2 class="pa-h2" id="poshact-confidentiality">Confidentiality</h2>
                    <h3 class="pa-h3" id="poshact-maintainingconfidentiality">Maintaining Confidentiality is mandatory under POSH Act</h3>
                    <p class="pa-p">POSH Act makes it very clear that confidentiality of the complaint and the proceedings should be maintained.</p>
                    <div class="pa-callout">
                        <p class="text-white mb-1 h4">
                            Section 16 of the POSH Act states:
                        </p>
                        <p class="mb-0">
                            Prohibition of publication or making known contents of complaint and inquiry proceedings. — Notwithstanding anything contained in the Right to Information Act, 2005 (22 of 2005), the contents of the complaint made under section 9,
                            the identity and addresses of the aggrieved woman, respondent and witnesses, any information relating to conciliation and inquiry proceedings, recommendations of the Internal Committee or the Local Committee, as the case may be,
                            and the action taken by the employer or the District Officer under the provisions of this Act shall not be published, communicated or made known to the public, press and media in any manner: Provided that information may be
                            disseminated regarding the justice secured to any vicitim of sexual harassment under this Act without disclosing the name, address, identity or any other particulars calculated to lead to the identification of the aggrieved woman and witnesses. 
                        </p>
                    </div>
                    <hr class="pa-divider">

                    <h3 class="pa-h3" id="poshact-poshstipulatesconfidentiality">POSH stipulates Confidentiality and not complete Anonymity</h3>
                    <p class="pa-p">
                        We must understand that POSH Act stipulates Confidentiality and not complete Anonymity. Since the Internal Committee follows the principles of natural justice all documents involved in the inquiry should be provided to both
                        the complainant and the respondent. It is impossible to provide complete anonymity to the parties and also share the entire details of the case with each other. It must also be noted that since most of the sexual harassment
                        cases are individual experiences, the narration of incidents could reveal the identity of the parties/witnesses involved even if names are concealed.
                    </p>
                    <hr class="pa-divider">

                    <h3 class="pa-h3" id="poshact-confidentialinformation">What information must be kept confidential?</h3>
                    <p class="pa-p">
                        Following information should not be made to known to public, press or media.
                    </p>
                    <ul class="pa-list">
                        <li>Identity of the complainant, respondent or the witnesses,</li>
                        <li>Inquiry proceedings</li>
                        <li>Conciliation details</li>
                        <li>Recommendations of the IC and</li>
                        <li>Actions taken by the employer</li>
                    </ul>
                    <hr class="pa-divider">

                    <h3 class="pa-h3" id="poshact-penaltyforbreachofconfidentiality">Penalty for breach of confidentiality</h3>
                    <p class="pa-p">
                        Anyone contravening the provision of confidentiality will be liable for penalty in accordance with the service rules. In the absence of a service rule,
                        the employer can impose a fine of five thousand rupees for breach of confidentiality.
                    </p>
                    <hr class="pa-divider">

                    <h3 class="pa-h3" id="poshact-icdotomaintainconfidentiality">What can the IC do to maintain confidentiality?</h3>
                    <h4 class="pa-h4">Create Awareness Proactively</h4>
                    <p class="pa-p">
                        Flow of information can be prevented only by taking pro-active steps. During the regular POSH trainings for employees, emphasize on the importance of maintaining confidentiality. Communicate the serious consequences to the individuals
                        and the organizations, if the information is leaked.
                    </p>
                    <h4 class="pa-h4">Include a clause on confidentiality in the POSH Policy</h4>
                    <p class="pa-p">
                        The complainant might have spoken to her manager, the HR or the Grievance Redressal Team before reporting to the IC. They might have also informed a close colleague or friend about the incident. It is also possible that the witnesses
                        told others about the incident. The information will quickly spread through office grapevine.
                    </p>
                    <p class="pa-p">
                        Therefore, a confidentiality clause should be included in the POSH policy to ensure that employees who hear about incidents do not make the information known to others. It should also include the penalty for breach of confidentiality.
                        IC must ensure that all the employees are aware about these.
                    </p>
                    <h4 class="pa-h4">Sign non-disclosure agreement</h4>
                    <p class="pa-p">
                        Apart from the complainant, respondent and witnesses, some people in the organization like managers, HR and the employer would know about the incident. When information must be shared with anyone in the organization, get non-disclosure
                        agreements signed by them and restrict the flow of information on a need-to-know basis.
                    </p>
				</section>
				<section class="pa-section">
                        <!-- Appeal -->
                    <h2 class="pa-h2" id="poshact-appeal">Appeal</h2>
                    <h3 class="pa-h3" id="poshact-appealagainstfindings">Appeal against the findings of Internal Committee</h3>
                    <p class="pa-p">If the complainant or the respondent is unhappy about the findings of the Internal Committee or the implementation of the recommendations, they can go for an appeal.</p>
                    <div class="pa-callout">
                        <p class="text-white mb-2 h4">
                            Section 18 of the POSH Act states that:
                        </p>
                        <p class="mb-0">
                            Appeal.—(1) Any person aggrieved from the recommendations made under sub-section (2) of section 13 or under clause (i) or clause (ii) of sub-section (3) of section 13 or sub-section (1) or sub-section (2) of section 14 or section 17
                            or non-implementation of such recommendations may prefer an appeal to the court or tribunal in accordance with the provisions of the service rules applicable to the said person or where no such service rules exist then, without
                            prejudice to provisions contained in any other law for the time being in force, the person aggrieved may prefer an appeal in such manner as may be prescribed.    
                        </p>
                    </div>
                    <h4 class="pa-h4">Any person aggrieved by the:</h4>
                    <ul class="pa-list">
                        <li>Conclusions made by the IC</li>
                        <li>Actions recommended by the IC or</li>
                        <li>Non-implementation of such recommendations of IC</li>
                    </ul>
                    <p class="pa-p">
                        can file an appeal to the appropriate court or tribunal. The Appellate Authority for sexual harassment cases under the POSH Act is same as the appellate authority designated under Industrial Standing Order Act, 1946.
                    </p>
                    <p class="pa-p">
                        The organization can also form an Appellate Committee to review the findings of the IC. It is important that the IC Members who did the inquiry for the case are not part of the appellate committee. The Appellate Committee formed by the organization are not bound by the POSH Act. They are bound by the Service Rules of the organization and will act as per the Service Rules.
                    </p>
                    <hr class="pa-divider">

                    <h3 class="pa-h3" id="poshact-timelinetofileappeal">Timeline to File an Appeal</h3>
                    <p class="pa-p">The appeal should be made within ninety days since the date of recommendations from the IC.</p>
                    <div class="pa-callout">
                        <p class="text-white mb-2 h4">
                            Section 18 (2) states:
                        </p>
                        <p class="mb-0">
                            “The appeal under sub-section (1) shall be preferred within a period of ninety days of the recommendations.”
                        </p>
                    </div>
				</section>
				<section class="pa-section">
                        <!-- Background of POSH Act -->
                    <h2 class="pa-h2" id="poshact-backgroundofposhact">Background of POSH Act</h2>
                    <h3 class="pa-h3" id="poshact-pacomeintoexistence">Why did POSH Act come into existence?</h3>
                    <p class="pa-p">
                        A safe workplace is a woman’s legal right. Preamble to the Constitution of India mentions that <b class="pa-emphasis">“equality of status and opportunity”</b> must be secured for all its citizens. Equality and personal liberty of every person under the law is guaranteed by Articles 14, 15 and 21 of the Constitution.
                    </p>
                    <p class="pa-p">
                        Sexual harassment at workplace is an infringement of the fundamental rights of a woman and goes against the spirit of Article 19 (1) (g) of the Constitution of India which states that every citizen of India has the right <b class="pa-emphasis">“to practice any profession or to carry out any occupation, trade or business”;</b> as in many cases sexual harassment at workplace prevents women from working.
                    </p>
                    <p class="pa-p">
                        So, there was a necessity to enact a powerful law that mandates all workplaces in India to provide women with a safe and secure working environment free from sexual harassment.
                    </p>

                    <h4 class="pa-h4">Vishaka Guidelines</h4>
                    <p class="pa-p">
                        The POSH Act is modelled on the legally binding guidelines laid down by the Honourable Supreme Court in the case “Vishaka vs. State of Rajasthan (1997)”, commonly known as the Vishaka Guidelines.
                    </p>
                    <h4 class="pa-h4">Vishaka Guidelines - Background</h4>
                    <p class="pa-p">
                        A lady named Bhanwari Devi was engaged by the state of Rajasthan to prevent the evil practice of child marriages. Her work was met with resentment and she was gang raped in 1992. The Bhanwari Devi case revealed the ever-present sexual harm to which millions of working women are exposed across the country, everywhere and everyday irrespective of their location.
                    </p>
                    <p class="pa-p">
                        Based on the facts of Bhanwari Devi’s case, a Public Interest Litigation (PIL) was filed before the Supreme Court by Vishaka and other women groups against the State of Rajasthan and Union of India. It proposed that sexual harassment be recognized as a violation of women’s fundamental right to equality and that all workplaces/establishments/institutions be made accountable and responsible to uphold these rights.
                    </p>
                    <p class="pa-p">
                        In the judgment passed in this case, the Honourable Supreme Court defined Sexual Harassment with examples, placed responsibility on employers to ensure that women did not face a hostile environment and directed them to establish a redressal mechanism in the form of Complaints Committee which will look into the matters of sexual harassment of women at workplace. The guidelines extended to all kinds of employment, from paid to voluntary, across the public and private sectors. Vishaka Guidelines provided critical visibility to the sexual harassment issue that was not taken seriously earlier.
                    </p>
                    <hr class="pa-divider">

                    <!-- Concluding Remarks -->
                    <h3 class="pa-h3">Concluding Remarks</h3>
                    <p class="pa-p">
                        Enactment of POSH Act is a huge milestone in the long fight against the menace of sexual harassment of women in the workplace. Since POSH Act was enacted specifically to deal with sexual harassment of women at workplace, it is extremely favorable to the aggrieved women. It’s high time we join hands to spread the awareness about POSH Act and its implementation which will pave way for creating respectful and safe working environments.
                    </p>
				</section>
			</article>
			<?php
			if ( function_exists( 'elearnposh_amp_render_guide_mobile_contact_section' ) ) {
				echo elearnposh_amp_render_guide_mobile_contact_section( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					__( 'POSH Act Page', 'elearnposh-amp' ),
					'ep-posh-act-mobile',
					'posh-act'
				);
			}
			?>
		</div>
	</div>
</div>
	<a class="pa-top" href="#topofthepage" aria-label="<?php echo esc_attr__( 'Back to top', 'elearnposh-amp' ); ?>">&#8593;</a>
</main>