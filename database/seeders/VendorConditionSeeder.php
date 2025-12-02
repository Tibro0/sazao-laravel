<?php

namespace Database\Seeders;

use App\Models\VendorCondition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VendorCondition::insert([
            [
                'content' => "<h4><strong>1. Vendor Account &amp; Registration</strong></h4>
                    <ul>
                    <li>
                    <p class='ds-markdown-paragraph'>You must provide accurate, current, and complete information during registration and keep your account updated.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'>You are responsible for all activities under your account and for keeping your password secure.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'>You may only operate one vendor account per business without explicit written permission from Platform administration.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'>We reserve the right to suspend or terminate accounts that provide false information or violate these terms.</p>
                    </li>
                    </ul>
                    <h4><strong>2. Product Listings &amp; Content</strong></h4>
                    <ul>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Accuracy:</strong>&nbsp;You are solely responsible for the accuracy, quality, and legality of the products you list, including descriptions, prices, images, and inventory levels.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Prohibited Items:</strong>&nbsp;You must not list items that are illegal, counterfeit, stolen, infringing on intellectual property rights, or fall under our&nbsp;<strong>Prohibited Items List</strong>&nbsp;(see Appendix A).</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Content Ownership:</strong>&nbsp;You guarantee you own or have the rights to use all content (images, text, videos) you upload. You grant [Your Platform Name] a non-exclusive, worldwide license to use, display, and promote this content on the Platform.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Pricing:</strong>&nbsp;You set your own prices. However, you must not engage in predatory pricing, price gouging, or deceptive discount practices.</p>
                    </li>
                    </ul>
                    <h4><strong>3. Order Fulfillment &amp; Customer Service</strong></h4>
                    <ul>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Processing Time:</strong>&nbsp;You must ship orders within the processing time stated on your product listing (e.g., 'Ships in 3-5 business days').</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Shipping:</strong>&nbsp;You are responsible for packaging, shipping, and bearing the cost of delivery to the customer's provided address. You must provide valid tracking information.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Customer Service:</strong>&nbsp;Primary customer service for your products (pre-sale questions, post-sale issues, returns initiation) is your responsibility. You must respond to customer inquiries via the Platform's messaging system within&nbsp;<strong>48 hours</strong>&nbsp;on business days.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Returns &amp; Refunds:</strong>&nbsp;You must adhere to the Platform's&nbsp;<strong>Return &amp; Refund Policy</strong>. For approved returns, you are responsible for providing a return address and issuing refunds (minus Platform fees) upon receipt of the returned item in its original condition.</p>
                    </li>
                    </ul>
                    <h4><strong>4. Fees &amp; Payments</strong></h4>
                    <ul>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Commission: </strong>Website charges a commission of <strong>[e.g., 15%]</strong>&nbsp;on the total sale price (including shipping charges paid by the customer). This commission is automatically deducted from your payout.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Transaction Fees:</strong>&nbsp;Payment processing fees may apply and will be detailed in your vendor dashboard.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Payouts:</strong>&nbsp;Payouts for completed orders (after the order delivery and any return/dispute window) are processed&nbsp;<strong>[e.g., every two weeks]</strong>&nbsp;via your selected method (e.g., PayPal, Bank Transfer). Minimum payout thresholds may apply.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Taxes:</strong>&nbsp;You are solely responsible for calculating, collecting, reporting, and remitting any and all sales, VAT, GST, or other taxes applicable to your sales. The Platform may collect tax on your behalf in certain jurisdictions as required by law.</p>
                    </li>
                    </ul>
                    <h4><strong>5. Intellectual Property</strong></h4>
                    <ul>
                    <li>
                    <p class='ds-markdown-paragraph'>You must not infringe on the copyright, trademark, patent, or other rights of any third party.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'>If you list branded products, you must be an authorized reseller or have the legal right to sell them.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'>[Your Platform Name]'s name, logo, and website design are our property. You may not use them without our prior written consent.</p>
                    </li>
                    </ul>
                    <h4><strong>6. Prohibited Conduct</strong></h4>
                    <p class='ds-markdown-paragraph'>You agree not to:</p>
                    <ul>
                    <li>
                    <p class='ds-markdown-paragraph'>Circumvent the Platform's payment system or attempt to conduct transactions offline.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'>Contact customers outside the Platform's messaging system for transaction purposes.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'>Engage in fee avoidance.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'>Provide false tracking information or drop-ship from another retailer without fulfilling quality control.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'>Manipulate reviews or ratings.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'>Engage in any activity that damages the reputation or functionality of the Platform.</p>
                    </li>
                    </ul>
                    <h4><strong>7. Liability &amp; Indemnification</strong></h4>
                    <ul>
                    <li>
                    <p class='ds-markdown-paragraph'>[Your Platform Name] acts as a facilitator, not a seller. We are not liable for any disputes between you and a buyer, or for any issues arising from your products (e.g., defects, safety, misrepresentation).</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'>You agree to indemnify and hold [Your Platform Name], its owners, and employees harmless from any claims, damages, or losses arising from your breach of these terms, your products, or your actions.</p>
                    </li>
                    </ul>
                    <h4><strong>8. Termination</strong></h4>
                    <ul>
                    <li>
                    <p class='ds-markdown-paragraph'>You may close your vendor account at any time with written notice, pending fulfillment of all outstanding orders.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'>We reserve the right to suspend or terminate your account immediately, without liability, if you breach these terms, engage in fraudulent activity, or cause harm to the Platform or our community.</p>
                    </li>
                    </ul>
                    <h4><strong>9. Amendments</strong></h4>
                    <p class='ds-markdown-paragraph'>Website may update these Terms &amp; Conditions at any time. We will notify vendors of material changes via email or a dashboard announcement. Continued use of the Platform after changes constitutes acceptance.</p>
                    <h4><strong>10. Governing Law</strong></h4>
                    <p class='ds-markdown-paragraph'>These Terms shall be governed by the laws of USA.</p>",
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
