<?php

namespace Database\Seeders;

use App\Models\TermsAndCondition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TermsAndConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TermsAndCondition::insert([
            [
                'content' => "<h3><strong>Terms and Conditions for Sazao</strong></h3>
                    <p class='ds-markdown-paragraph'><strong>Last Updated:</strong> 2025</p>
                    <p class='ds-markdown-paragraph'>Welcome to MarketplaceHub ('the Platform,' ''we,' 'our,' 'us'). These Terms and Conditions govern your access to and use of our website, services, and applications as a visitor, customer ('Buyer'), or independent vendor ('Seller').</p>
                    <p class='ds-markdown-paragraph'>By accessing or using the Platform, you agree to be bound by these Terms. If you do not agree, you may not use our services.</p>
                    <h4><strong>1. Definitions</strong></h4>
                    <ul>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>'Platform'</strong>: The MarketplaceHub website and mobile application.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>'Buyer'</strong>: A user who purchases products or services from Sellers via the Platform.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>'Seller' / 'Vendor'</strong>: An independent third party who lists and sells products or services directly to Buyers via the Platform.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>'Content'</strong>: Any text, images, reviews, product descriptions, logos, or data uploaded to the Platform.</p>
                    </li>
                    </ul>
                    <h4><strong>2. Account Registration</strong></h4>
                    <p class='ds-markdown-paragraph'>You must create an account to make a purchase or become a Seller. You are responsible for maintaining the confidentiality of your account and password and for all activities under your account. You agree to provide accurate and complete information and to update it promptly.</p>
                    <h4><strong>3. Relationship of Parties</strong></h4>
                    <p class='ds-markdown-paragraph'>MarketplaceHub is a&nbsp;<strong>venue, not a seller</strong>. We provide a digital marketplace for Sellers to list goods and services and for Buyers to purchase them.</p>
                    <ul>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>We are not a party</strong>&nbsp;to the contract of sale between a Buyer and a Seller. The Seller is solely responsible for fulfilling orders, product quality, safety, legality, and descriptions.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'>We are not responsible for the actions, omissions, or content of any user.</p>
                    </li>
                    </ul>
                    <h4><strong>4. Seller Terms &amp; Obligations</strong></h4>
                    <p class='ds-markdown-paragraph'>By registering as a Seller, you additionally agree:</p>
                    <ul>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Accuracy:</strong>&nbsp;You are solely responsible for the accuracy, legality, and truthfulness of your product listings, images, and descriptions.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Compliance:</strong>&nbsp;You warrant that you own or have the right to sell all items listed, and that they comply with all applicable laws, including safety and labeling standards.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Fulfillment:</strong>&nbsp;You are responsible for order processing, shipping, returns, refunds, and customer service for your sales. You must clearly state your shipping, return, and warranty policies.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Prohibited Items:</strong>&nbsp;You may not list prohibited items, including but not limited to illegal goods, counterfeit items, hazardous materials, or items that infringe on intellectual property rights.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Fees:</strong>&nbsp;You agree to pay the commission fees as outlined in our separate&nbsp;<strong>Seller Fee Agreement</strong>. MarketplaceHub may deduct commissions from your sales proceeds.</p>
                    </li>
                    </ul>
                    <h4><strong>5. Buyer Terms &amp; Obligations</strong></h4>
                    <ul>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Purchases:</strong>&nbsp;When you buy an item, you are entering into a contract directly with the Seller named on the listing. You agree to read the Seller's policies before purchasing.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Payment:</strong>&nbsp;All payments are processed through our designated payment gateways. You authorize us to charge your chosen payment method for the total amount (item price, shipping, tax).</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Disputes:</strong>&nbsp;Any issues regarding an item (e.g., non-delivery, damage, not-as-described) must be addressed first with the Seller. MarketplaceHub may offer a dispute resolution process but is not obligated to provide a refund.</p>
                    </li>
                    </ul>
                    <h4><strong>6. Platform Fees &amp; Payments</strong></h4>
                    <ul>
                    <li>
                    <p class='ds-markdown-paragraph'>Buyers pay the price set by the Seller plus any applicable taxes and shipping.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'>Sellers receive the sale price minus our commission and any payment processing fees. Payouts are made according to our&nbsp;<strong>Payout Schedule</strong>.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'>We reserve the right to change our fee structure with prior notice to Sellers.</p>
                    </li>
                    </ul>
                    <h4><strong>7. Intellectual Property</strong></h4>
                    <ul>
                    <li>
                    <p class='ds-markdown-paragraph'>The Platform's software, design, logos, and 'MarketplaceHub' trademark are owned by us.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'>Sellers retain ownership of the intellectual property in their product listings and brands. By listing an item, you grant MarketplaceHub a worldwide, non-exclusive license to display, promote, and use that content on the Platform.</p>
                    </li>
                    </ul>
                    <h4><strong>8. Prohibited Activities</strong></h4>
                    <p class='ds-markdown-paragraph'>You agree not to:</p>
                    <ul>
                    <li>
                    <p class='ds-markdown-paragraph'>Use the Platform for any illegal purpose.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'>Circumvent our payment system or fee structure.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'>Misrepresent your identity or provide false information.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'>Interfere with the Platform's security or functionality.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'>Harass other users or our staff.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'>Use data mining or scraping tools on the Platform.</p>
                    </li>
                    </ul>
                    <h4><strong>9. Limitation of Liability</strong></h4>
                    <p class='ds-markdown-paragraph'>TO THE FULLEST EXTENT PERMITTED BY LAW, MARKETPLACEHUB AND ITS AFFILIATES SHALL NOT BE LIABLE FOR ANY INDIRECT, INCIDENTAL, SPECIAL, OR CONSEQUENTIAL DAMAGES ARISING FROM YOUR USE OF THE PLATFORM OR ANY TRANSACTION BETWEEN USERS. OUR TOTAL LIABILITY IS LIMITED TO THE AMOUNT OF COMMISSIONS WE EARNED FROM A SPECIFIC TRANSACTION IN QUESTION.</p>
                    <h4><strong>10. Indemnification</strong></h4>
                    <p class='ds-markdown-paragraph'>You agree to indemnify and hold harmless MarketplaceHub, its officers, and employees from any claim or demand arising out of your use of the Platform, your breach of these Terms, your products, or your violation of any law or third-party rights.</p>
                    <h4><strong>11. Termination</strong></h4>
                    <p class='ds-markdown-paragraph'>We may suspend or terminate your account and access to the Platform at our sole discretion, without notice, for conduct we believe violates these Terms or is harmful to other users, us, or third parties.</p>
                    <h4><strong>12. General</strong></h4>
                    <ul>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Governing Law:</strong>&nbsp;These Terms shall be governed by the laws of [State/Country].</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Changes:</strong>&nbsp;We may modify these Terms at any time. We will notify users of material changes. Continued use of the Platform constitutes acceptance of the new Terms.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Severability:</strong>&nbsp;If any provision is found invalid, the remaining provisions will remain in full force.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Contact:</strong>&nbsp;For questions about these Terms, please contact us at:&nbsp;legal@marketplacehub-dummy.com.</p>
                    </li>
                    </ul>",
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
