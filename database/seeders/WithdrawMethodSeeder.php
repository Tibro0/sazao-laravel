<?php

namespace Database\Seeders;

use App\Models\WithdrawMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WithdrawMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WithdrawMethod::insert([
            [
                'name' => 'Bank',
                'minimum_amount' => 100,
                'maximum_amount' => 1000,
                'withdraw_charge' => 10,
                'description' => "<h3><strong>Core Components of a Payment Instruction</strong></h3>
                    <h4><strong>1. Payer Information (Your Details)</strong></h4>
                    <ul>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Account Holder Name:</strong>&nbsp;The name on the account from which funds are being sent.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Account Number/IBAN:</strong>&nbsp;Your account identifier.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Bank Name &amp; Address:</strong>&nbsp;Your bank's details (often auto-populated).</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>BIC/SWIFT Code:</strong>&nbsp;Your bank's international identification code (for cross-border payments).</p>
                    </li>
                    </ul>
                    <h4><strong>2. Beneficiary Information (Recipient Details) -&nbsp;<em>MOST IMPORTANT</em></strong></h4>
                    <ul>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Beneficiary Name:</strong>&nbsp;The&nbsp;<strong>full and exact name</strong>&nbsp;of the person or company receiving the funds. Must match their bank records.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Beneficiary Account Number/IBAN:</strong>&nbsp;Their unique account identifier.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Beneficiary Bank Name &amp; Address:</strong>&nbsp;The recipient's bank details.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Beneficiary Bank BIC/SWIFT Code:</strong>&nbsp;Essential for international transfers.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Clearing Codes:</strong>&nbsp;For some countries (e.g., Routing Number for USA, Sort Code for UK, BSB for Australia).</p>
                    </li>
                    </ul>
                    <h4><strong>3. Payment Details</strong></h4>
                    <ul>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Amount:</strong>&nbsp;The precise sum to be transferred.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Currency:</strong>&nbsp;The currency of the payment (e.g., USD, EUR, GBP).</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Payment Date:</strong>&nbsp;When the payment should be processed (can be 'immediately' or a future date).</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Payment Reference/Description:</strong>&nbsp;A message to the beneficiary (e.g., 'Invoice #12345,' 'Rent for May'). This is crucial for their reconciliation.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Your Reference:</strong>&nbsp;A code for your own records (e.g., a project code or internal voucher number).</p>
                    </li>
                    </ul>
                    <h4><strong>4. Transaction &amp; Cost Details</strong></h4>
                    <ul>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Transfer Type:</strong>&nbsp;Domestic, International (SWIFT), SEPA (within Eurozone).</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Charge Instructions:</strong>&nbsp;Who bears the transfer costs:</p>
                    <ul>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>SHA</strong>&nbsp;(Shared): You pay your bank's charges; beneficiary pays their bank's charges. Most common.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>OUR:</strong>&nbsp;You pay&nbsp;<strong>all</strong>&nbsp;charges (both banks). Ensures the beneficiary receives the exact amount.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>BEN</strong>&nbsp;(Beneficiary): Beneficiary pays all charges (amount received will be less).</p>
                    </li>
                    </ul>
                    </li>
                    </ul>",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'PayPal',
                'minimum_amount' => 50,
                'maximum_amount' => 1000,
                'withdraw_charge' => 10,
                'description' => "<h3><strong>3. Sending Instructions For PayPal</strong></h3>
                    <p class='ds-markdown-paragraph'><strong>For Personal Payments:</strong></p>
                    <ul>
                    <li>
                    <p class='ds-markdown-paragraph'>Go to&nbsp;<a href='https://paypal.com/' target='_blank' rel='noopener noreferrer'>PayPal.com</a>&nbsp;or open the app</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'>Click 'Send &amp; Request'</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'>Enter recipient's email/phone/<a href='https://paypal.me/' target='_blank' rel='noopener noreferrer'>PayPal.Me</a>&nbsp;link</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'>Select 'Sending to a friend' (no fees)</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'>Add note with order/reference details</p>
                    </li>
                    </ul>
                    <p class='ds-markdown-paragraph'><strong>For Business/Goods Payments:</strong></p>
                    <ul>
                    <li>
                    <p class='ds-markdown-paragraph'>Select 'Paying for an item or service'</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'>Complete transaction as buyer protection applies</p>
                    </li>
                    </ul>",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Stripe',
                'minimum_amount' => 50,
                'maximum_amount' => 1000,
                'withdraw_charge' => 10,
                'description' => "<h1><strong>Stripe Payment Setup Instructions</strong></h1>
                    <h2><strong>Step 1: Create a Stripe Account</strong></h2>
                    <ol start='1'>
                    <li>
                    <p class='ds-markdown-paragraph'>Go to&nbsp;<a href='https://stripe.com/' target='_blank' rel='noopener noreferrer'>stripe.com</a></p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'>Click 'Sign up' and create an account using your business email</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'>Choose 'Business' account type</p>
                    </li>
                    </ol>
                    <h2><strong>Step 2: Complete Your Business Profile</strong></h2>
                    <p class='ds-markdown-paragraph'>In your Stripe Dashboard, please provide:</p>
                    <ul>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Legal business name</strong>&nbsp;(must match tax documents)</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Business address</strong></p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Phone number</strong></p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Website</strong>&nbsp;(if applicable)</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Business description</strong></p>
                    </li>
                    </ul>
                    <h2><strong>Step 3: Add Banking Information</strong></h2>
                    <p class='ds-markdown-paragraph'>Navigate to&nbsp;<strong>Settings &rarr; Bank accounts and scheduling</strong>:</p>
                    <ul>
                    <li>
                    <p class='ds-markdown-paragraph'>Add your business bank account details</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'>Ensure account name matches your business name</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'>Include routing and account numbers</p>
                    </li>
                    </ul>
                    <h2><strong>Step 4: Provide Tax Information</strong></h2>
                    <p class='ds-markdown-paragraph'>Under&nbsp;<strong>Settings &rarr; Business information</strong>:</p>
                    <ul>
                    <li>
                    <p class='ds-markdown-paragraph'>Provide your Tax ID (EIN/SSN)</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'>Complete W-9/W-8BEN form as applicable</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'>Specify your business structure (LLC, Corporation, Sole Proprietorship, etc.)</p>
                    </li>
                    </ul>
                    <h2><strong>Step 5: Verification Requirements</strong></h2>
                    <p class='ds-markdown-paragraph'>Prepare these documents for verification:</p>
                    <ul>
                    <li>
                    <p class='ds-markdown-paragraph'>Government-issued ID</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'>Business license/formation documents</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'>Bank statement or voided check</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'>Proof of address (if required)</p>
                    </li>
                    </ul>
                    <h2><strong>Important Notes:</strong></h2>
                    <ul>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Payment Schedule:</strong>&nbsp;We process payments [weekly/bi-weekly/monthly] on [specific day]</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Fees:</strong>&nbsp;Stripe charges a standard processing fee of 2.9% + $0.30 per transaction</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>First Payment:</strong>&nbsp;May be delayed by 7-14 days due to Stripe's initial verification period</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Payout Timeline:</strong>&nbsp;First payout typically takes 7-14 days, then 2-business days thereafter</p>
                    </li>
                    </ul>
                    <h2><strong>Required Information to Send Us:</strong></h2>
                    <p class='ds-markdown-paragraph'>Once your Stripe account is set up, please provide:</p>
                    <ol start='1'>
                    <li>
                    <p class='ds-markdown-paragraph'>Your Stripe Account ID (found in Settings &rarr; Account details)</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'>The email associated with your Stripe account</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'>Confirmation that your account is fully verified</p>
                    </li>
                    </ol>
                    <h2><strong>Support Resources:</strong></h2>
                    <ul>
                    <li>
                    <p class='ds-markdown-paragraph'>Stripe Support:&nbsp;<a href='https://support.stripe.com/' target='_blank' rel='noopener noreferrer'>https://support.stripe.com</a></p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'>Our contact: [Your Contact Email/Phone]</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'>Stripe Setup Guide:&nbsp;<a href='https://stripe.com/docs/connect' target='_blank' rel='noopener noreferrer'>https://stripe.com/docs/connect</a></p>
                    </li>
                    </ul>
                    <h2><strong>Security Reminders:</strong></h2>
                    <ul>
                    <li>
                    <p class='ds-markdown-paragraph'>Never share your Stripe login credentials</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'>Enable two-factor authentication</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'>Use secure networks when accessing your account</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'>Monitor your account regularly for transactions</p>
                    </li>
                    </ul>
                    <h2><strong>Next Steps:</strong></h2>
                    <ol start='1'>
                    <li>
                    <p class='ds-markdown-paragraph'>Complete Stripe setup within [number] days</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'>Email us at [your email] with your Stripe Account ID</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'>We'll connect your account to our system</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'>You'll receive a test payment confirmation</p>
                    </li>
                    </ol>
                    <p class='ds-markdown-paragraph'><strong>Deadline:</strong>&nbsp;Please complete this setup by [date] to ensure uninterrupted payments.</p>
                    <p class='ds-markdown-paragraph'>For any questions or assistance, please contact [Your Name/Department] at [email/phone].</p>
                    <p class='ds-markdown-paragraph'>Best regards,</p>
                    <p class='ds-markdown-paragraph'>[Your Company Name]<br />[Your Contact Information]</p>",
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
