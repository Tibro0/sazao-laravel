<?php

namespace Database\Seeders;

use App\Models\PrivacyPolicy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrivacyPolicySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PrivacyPolicy::insert([
            [
                'content' => "<h3><strong>Privacy Policy for Sazao</strong></h3>
                    <p class='ds-markdown-paragraph'><strong>Last Updated:</strong>&nbsp;2025</p>
                    <p class='ds-markdown-paragraph'>This Privacy Policy describes how Sazao ('we,' 'us,' or 'our') collects, uses, and shares your personal information when you use our multi-vendor marketplace website Sazao&nbsp;(the 'Site').</p>
                    <h4><strong>1. Information We Collect</strong></h4>
                    <p class='ds-markdown-paragraph'>We collect information you provide directly to us, from third parties (like vendors), and automatically when you use our Site.</p>
                    <ul>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Information You Provide:</strong></p>
                    <ul>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Account Information:</strong>&nbsp;Name, email address, password, phone number, billing/shipping address, profile picture.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Transaction Information:</strong>&nbsp;Payment information (processed by secure third-party gateways like Stripe/PayPal), order history, communications with vendors or us.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Vendor-Specific Information:</strong>&nbsp;If you apply as a vendor, we may collect business name, tax ID, bank account details for payments, and product information.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>User Content:</strong>&nbsp;Product reviews, questions/answers on product pages, forum posts, or other content you submit.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Communications:</strong>&nbsp;Records of your chats with vendors or customer support.</p>
                    </li>
                    </ul>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Information Collected Automatically:</strong></p>
                    <ul>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Device &amp; Log Data:</strong>&nbsp;IP address, browser type, operating system, pages visited, time spent, and referral URLs.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Cookies &amp; Tracking Technologies:</strong>&nbsp;We use cookies and similar tech to remember your preferences, analyze site traffic, and personalize ads. You can control cookies through your browser settings.</p>
                    </li>
                    </ul>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Information from Third Parties:</strong>&nbsp;We may receive information about you from vendors (e.g., updated delivery details) or advertising partners.</p>
                    </li>
                    </ul>
                    <h4><strong>2. How We Use Your Information</strong></h4>
                    <p class='ds-markdown-paragraph'>We use the information we collect to:</p>
                    <ul>
                    <li>
                    <p class='ds-markdown-paragraph'>Operate, maintain, and improve the Site.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'>Process your orders, payments, and payouts to vendors.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'>Create and manage your account and vendor store (if applicable).</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'>Facilitate communication between buyers and vendors.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'>Send you transactional emails (order confirmations, updates), administrative notices, and (with your consent) marketing communications.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'>Personalize your experience and show you relevant products.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'>Detect, prevent, and address fraud, security, or technical issues.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'>Comply with legal obligations.</p>
                    </li>
                    </ul>
                    <h4><strong>3. Sharing of Your Information</strong></h4>
                    <p class='ds-markdown-paragraph'>We may share your information in the following circumstances:</p>
                    <ul>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>With Vendors:</strong>&nbsp;To fulfill your orders, necessary information (name, shipping address, contact details, order specifics) is shared with the vendor selling the product.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>With Service Providers:</strong>&nbsp;With trusted companies that help us operate (payment processors, hosting, delivery/logistics, analytics, marketing).</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>For Legal Reasons:</strong>&nbsp;If required by law, subpoena, or to protect the rights, property, or safety of us, our users, or others.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Business Transfers:</strong>&nbsp;In connection with a merger, sale, or acquisition of all or part of our business.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>With Your Consent:</strong>&nbsp;For any other purpose disclosed to you with your permission.</p>
                    </li>
                    </ul>
                    <p class='ds-markdown-paragraph'><strong>Note:</strong>&nbsp;Vendors are independent data controllers for the buyer information they receive. Please review their individual privacy practices.</p>
                    <h4><strong>4. Your Rights &amp; Choices</strong></h4>
                    <p class='ds-markdown-paragraph'>Depending on your location, you may have rights to:</p>
                    <ul>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Access, Update, or Delete</strong>&nbsp;your account information through your account settings.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Opt-out</strong>&nbsp;of marketing emails by clicking the 'unsubscribe' link.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Control Cookies</strong>&nbsp;through your browser settings.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Data Subject Rights</strong>&nbsp;(for EU/UK/CA etc.): You may have the right to access, correct, port, or request deletion of your personal data. Contact us to exercise these rights.</p>
                    </li>
                    </ul>
                    <h4><strong>5. Data Retention</strong></h4>
                    <p class='ds-markdown-paragraph'>We retain your personal information only as long as necessary to fulfill the purposes outlined in this policy, unless a longer retention period is required by law.</p>
                    <h4><strong>6. Data Security</strong></h4>
                    <p class='ds-markdown-paragraph'>We implement reasonable security measures to protect your information. However, no method of transmission over the Internet is 100% secure, and we cannot guarantee absolute security.</p>
                    <h4><strong>7. Third-Party Links</strong></h4>
                    <p class='ds-markdown-paragraph'>Our Site contains links to vendor stores and other third-party sites. We are not responsible for the privacy practices of these external sites.</p>
                    <h4><strong>8. Children's Privacy</strong></h4>
                    <p class='ds-markdown-paragraph'>Our Site is not intended for individuals under the age of [e.g., 16 or 18]. We do not knowingly collect personal information from children.</p>
                    <h4><strong>9. International Transfers</strong></h4>
                    <p class='ds-markdown-paragraph'>Your information may be transferred to and processed in countries other than your own. We ensure appropriate safeguards are in place for such transfers.</p>
                    <h4><strong>10. Changes to This Policy</strong></h4>
                    <p class='ds-markdown-paragraph'>We may update this policy periodically. The 'Last Updated' date at the top will reflect changes. Continued use of the Site after changes constitutes acceptance.</p>
                    <h4><strong>11. Contact Us</strong></h4>
                    <p class='ds-markdown-paragraph'>If you have any questions about this Privacy Policy, please contact us at:<br />faysaltibro@gmail.com</p>",
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
