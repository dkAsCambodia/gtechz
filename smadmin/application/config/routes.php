<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//match2pay, help2pay,oxpay,coins,
$route['default_controller'] = 'sadministrator/view';
//admin routs
$route['sadministrator'] = 'sadministrator/view';
$route['sadministrator/home'] = 'sadministrator/home';
$route['sadministrator/index'] = 'sadministrator/view';
$route['sadministrator/forget-password'] = 'sadministrator/forget_password';

//$route['sadministrator/change-password'] = 'sadministrator/get_admin_data';
//$route['sadministrator/update-profile'] = 'sadministrator/update_admin_profile';
//dashboard starts here
//$route['dashboard'] = 'sadministrator/dashboard';
$route['sadministrator/dashboard'] = 'sadministrator/dashboard';
//$route['sadministrator/transactions'] = 'sadministrator/transactions';
$route['sadministrator/ptransactions'] = 'sadministrator/ptransactions';
$route['sadministrator/pendingtrans'] = 'sadministrator/pendingtrans';
$route['sadministrator/statements'] = 'sadministrator/statements';
$route['sadministrator/settlements'] = 'sadministrator/settlements';
//dashboard ends here
//Payment Gateway-Menu
$route['sadministrator/paymentgateways'] = 'zadministrator/paymentgateways/index';
$route['sadministrator/paymentgateways/index'] = 'zadministrator/paymentgateways/index';
//Payment Gateway-Menu
//PayOut Gateway-Menu
$route['sadministrator/payoutgateways'] = 'zadministrator/payoutgateways/index';
$route['sadministrator/payoutgateways/index'] = 'zadministrator/payoutgateways/index';
//PayOut Gateway-Menu
//Payment Gateway-Menu
//Transactions-Menu
$route['sadministrator/transactions'] = 'zadministrator/transactions/transactions_others';
$route['sadministrator/transactions/index'] = 'zadministrator/transactions/transactions_others';
$route['sadministrator/transactions/transactions-office'] = 'zadministrator/transactions/transactions_office';
$route['sadministrator/transactions/transactions-others'] = 'zadministrator/transactions/transactions_others';
$route['sadministrator/transactions/payout-others'] = 'zadministrator/transactions/payout_others';
$route['sadministrator/transactions/update-trnz'] = 'zadministrator/transactions/update_trnz';
//Transactions-Menu



//Payment Gateway
/*$route['sadministrator/paymentgateways'] = 'zadministrator/paymentgateways/index';
$route['sadministrator/paymentgateways/index'] = 'zadministrator/paymentgateways/index';*/
$route['sadministrator/paymentgateways/add-paymentgateway'] = 'sadministrator/paymentgateways/add_paymentgateway';
$route['sadministrator/paymentgateways/apikeyes'] = 'sadministrator/paymentgateways/apikeyes';
$route['sadministrator/paymentgateways/zaffranqrcodes'] = 'sadministrator/paymentgateways/zaffranqrcodes';
$route['sadministrator/paymentgateways/2FA'] = 'sadministrator/paymentgateways/get2FA';
$route['sadministrator/paymentgateways/deposits'] = 'sadministrator/paymentgateways/deposits';
$route['sadministrator/paymentgateways/limit-deposits'] = 'sadministrator/paymentgateways/limit_deposits';
$route['sadministrator/paymentgateways/withdraw'] = 'sadministrator/paymentgateways/withdraw';
$route['sadministrator/paymentgateways/limit-withdraw'] = 'sadministrator/paymentgateways/limit_withdraw';
$route['sadministrator/paymentgateways/transfer-settings'] = 'sadministrator/paymentgateways/transfer_settings';
$route['sadministrator/paymentgateways/subscriptions'] = 'sadministrator/paymentgateways/subscriptions';
$route['sadministrator/paymentgateways/notifications'] = 'sadministrator/paymentgateways/getnotifications';
$route['sadministrator/paymentgateways/verifications'] = 'sadministrator/paymentgateways/getverifications';
$route['sadministrator/paymentgateways/livechat'] = 'sadministrator/paymentgateways/livechat';
$route['sadministrator/paymentgateways/multi-languages'] = 'sadministrator/paymentgateways/multi_languages';
$route['sadministrator/paymentgateways/privacy-tos'] = 'sadministrator/paymentgateways/privacy_tos';
//Payment Gateway
//PayOut Gateway
/*$route['sadministrator/payoutgateways'] = 'sadministrator/payoutgateways/index';
$route['sadministrator/payoutgateways/index'] = 'sadministrator/payoutgateways/index';*/
$route['sadministrator/payoutgateways/transactions'] = 'sadministrator/payoutgateways/gettransactions';
$route['sadministrator/payoutgateways/statements'] = 'sadministrator/payoutgateways/getstatements';
$route['sadministrator/payoutgateways/developerAPI'] = 'sadministrator/payoutgateways/developerAPI';
$route['sadministrator/payoutgateways/withdrawal'] = 'sadministrator/payoutgateways/withdrawal';
$route['sadministrator/payoutgateways/withdrawal-history'] = 'sadministrator/payoutgateways/withdrawal_history';
$route['sadministrator/payoutgateways/profile-settings'] = 'sadministrator/payoutgateways/profile_settings';
$route['sadministrator/payoutgateways/2FA'] = 'sadministrator/payoutgateways/2FA';
$route['sadministrator/payoutgateways/zaffranqrcodes'] = 'sadministrator/payoutgateways/zaffranqrcodes';
$route['sadministrator/payoutgateways/apikeyes'] = 'sadministrator/payoutgateways/apikeyes';
//PayOut Gateway
//Payment Gateway-Menu
//Transactions-Menu
//Transactions
/*$route['sadministrator/transactions'] = 'sadministrator/transactions/index';
$route['sadministrator/transactions/index'] = 'sadministrator/transactions/index';
$route['sadministrator/transactions/all-transactions'] = 'sadministrator/transactions/index';
$route['sadministrator/transactions/pending'] = 'sadministrator/transactions/pending';
$route['sadministrator/transactions/approved'] = 'sadministrator/transactions/approved';
$route['sadministrator/transactions/declined'] = 'sadministrator/transactions/declined';
$route['sadministrator/transactions/refunded'] = 'sadministrator/transactions/refunded';
$route['sadministrator/transactions/chargeback'] = 'sadministrator/transactions/chargeback';
$route['sadministrator/transactions/refund-pending'] = 'sadministrator/transactions/refund_pending';
$route['sadministrator/transactions/reversed'] = 'sadministrator/transactions/reversed';
$route['sadministrator/transactions/test'] = 'sadministrator/transactions/test';
$route['sadministrator/transactions/scrubbed'] = 'sadministrator/transactions/scrubbed';
$route['sadministrator/transactions/predispute'] = 'sadministrator/transactions/predispute';
$route['sadministrator/transactions/partial-refund'] = 'sadministrator/transactions/partial_refund';
$route['sadministrator/transactions/withdraw-requested'] = 'sadministrator/transactions/withdraw_requested';
$route['sadministrator/transactions/withdraw-rolling'] = 'sadministrator/transactions/withdraw_rolling';
$route['sadministrator/transactions/fund'] = 'sadministrator/transactions/fund';
$route['sadministrator/transactions/recieve-fund'] = 'sadministrator/transactions/recieve_fund';
$route['sadministrator/transactions/sent-fund'] = 'sadministrator/transactions/sent_fund';
$route['sadministrator/transactions/frozen-balance'] = 'sadministrator/transactions/frozen_balance';
$route['sadministrator/transactions/frozen-rolling'] = 'sadministrator/transactions/frozen_rolling';
$route['sadministrator/transactions/expired'] = 'sadministrator/transactions/expired';
$route['sadministrator/transactions/cancelled'] = 'sadministrator/transactions/cancelled';
$route['sadministrator/transactions/allwithdraw'] = 'sadministrator/transactions/allwithdraw';*/
//Transactions
//Settlements
/*$route['sadministrator/transactions/settlements'] = 'sadministrator/transactions/getsettlements';
$route['sadministrator/transactions/all-settlements'] = 'sadministrator/transactions/getsettlements';
$route['sadministrator/transactions/pending-settlements'] = 'sadministrator/transactions/get_pending_settlements';
$route['sadministrator/transactions/success-settlements'] = 'sadministrator/transactions/get_success_settlements';
$route['sadministrator/transactions/failed-settlements'] = 'sadministrator/transactions/get_failed_settlements';
$route['sadministrator/transactions/disputed-settlements'] = 'sadministrator/transactions/get_failed_settlements';*/
//Settlements
//Statements
/*$route['sadministrator/transactions/statements'] = 'sadministrator/transactions/getstatements';*/
//Statements
//Transactions-Menu

//Merchants-Menu

//Merchants
$route['sadministrator/merchants'] = 'zadministrator/merchants/index';
$route['sadministrator/merchants/index'] = 'zadministrator/merchants/index';
$route['sadministrator/merchants/active-merchants'] = 'zadministrator/merchants/index';
$route['sadministrator/merchants/closed-merchants'] = 'zadministrator/merchants/getclosed_merchants';
$route['sadministrator/merchants/add-merchant'] = 'zadministrator/merchants/create';
$route['sadministrator/merchants/edit-merchant/(:any)'] = 'zadministrator/merchants/edit/$1';
$route['sadministrator/merchants/update'] = 'zadministrator/merchants/update';
$route['sadministrator/merchants/business-profile'] = 'zadministrator/merchants/getbusiness_profile';
$route['sadministrator/merchants/add-business-profile'] = 'zadministrator/merchants/create_business_profile';
$route['sadministrator/merchants/view-business-profile/(:any)'] = 'zadministrator/merchants/view_business_profile/$1';
$route['sadministrator/merchants/edit-business-profile/(:any)'] = 'zadministrator/merchants/edit_business_profile/$1';
$route['sadministrator/merchants/get-sub-merchants'] = 'zadministrator/merchants/get_sub_merchants';
$route['sadministrator/merchants/disputes'] = 'sadministrator/merchants/getdisputes';
$route['sadministrator/merchants/subscriptions'] = 'sadministrator/merchants/getsubscriptions';
$route['sadministrator/merchants/optimizer'] = 'sadministrator/merchants/getoptimizer';
$route['sadministrator/merchants/login-as-merchants'] = 'sadministrator/merchants/login_merchants';
//Merchants

//Security
$route['sadministrator/merchants/currency'] = 'sadministrator/merchants/merchants_currency';
$route['sadministrator/merchants/profile-settings'] = 'sadministrator/merchants/profile_settings';
$route['sadministrator/merchants/password-settings'] = 'sadministrator/merchants/password_settings';
$route['sadministrator/merchants/2FA'] = 'sadministrator/merchants/get2FA';
$route['sadministrator/merchants/qrcodes'] = 'sadministrator/merchants/qrcodes';
//Security
//Bank Accounts
$route['sadministrator/merchants/bank-accounts'] = 'sadministrator/merchants/getbankaccounts';
$route['sadministrator/merchants/add-bank-account'] = 'sadministrator/merchants/add_bank_account';
$route['sadministrator/merchants/crypto-accounts'] = 'sadministrator/merchants/getcryptoaccounts';
$route['sadministrator/merchants/add-crypto-account'] = 'sadministrator/merchants/add_crypto_account';
//Bank Accounts
//Wallets
$route['sadministrator/merchants/wallets-accounts'] = 'sadministrator/merchants/getwalletsaccounts';
$route['sadministrator/merchants/add-wallets-account'] = 'sadministrator/merchants/add_wallets_account';
//Wallets
//API Integration
$route['sadministrator/merchants/payment-gateways'] = 'sadministrator/merchants/getpaymentgateways';
$route['sadministrator/merchants/payment-checkout'] = 'sadministrator/merchants/getpayment_checkout';
$route['sadministrator/merchants/payment-links'] = 'sadministrator/merchants/getpayment_links';
$route['sadministrator/merchants/smart-collect'] = 'sadministrator/merchants/getsmart_collect';
$route['sadministrator/merchants/payment-routes'] = 'sadministrator/merchants/getpayment_routes';
$route['sadministrator/merchants/payment-epos'] = 'sadministrator/merchants/getpayment_epos';
//API Integration
//Orders
$route['sadministrator/merchants/cash-inward'] = 'sadministrator/merchants/getcash_inward';
$route['sadministrator/merchants/cash-outward'] = 'sadministrator/merchants/getcash_outward';
$route['sadministrator/merchants/commission-logs'] = 'sadministrator/merchants/getcommission_logs';
$route['sadministrator/merchants/maange-deposits'] = 'sadministrator/merchants/get_deposits';
$route['sadministrator/merchants/deposits-history'] = 'sadministrator/merchants/getall_deposits';
$route['sadministrator/merchants/maange-withdraw'] = 'sadministrator/merchants/get_withdraw';
$route['sadministrator/merchants/withdraw-history'] = 'sadministrator/merchants/getall_withdraw';
//Orders
//Transactions
$route['sadministrator/merchants/transactions'] = 'zadministrator/merchants/index';
$route['sadministrator/merchants/index'] = 'zadministrator/merchants/index';
$route['sadministrator/merchants/create'] = 'zadministrator/merchants/create';
$route['sadministrator/merchants/all-transactions'] = 'sadministrator/merchants/index';
$route['sadministrator/merchants/pending'] = 'sadministrator/merchants/pending';
$route['sadministrator/merchants/approved'] = 'sadministrator/merchants/approved';
$route['sadministrator/merchants/declined'] = 'sadministrator/merchants/declined';
$route['sadministrator/merchants/refunded'] = 'sadministrator/merchants/refunded';
$route['sadministrator/merchants/chargeback'] = 'sadministrator/merchants/chargeback';
$route['sadministrator/merchants/refund-pending'] = 'sadministrator/merchants/refund_pending';
$route['sadministrator/merchants/reversed'] = 'sadministrator/merchants/reversed';
$route['sadministrator/merchants/test'] = 'sadministrator/merchants/test';
$route['sadministrator/merchants/scrubbed'] = 'sadministrator/merchants/scrubbed';
$route['sadministrator/merchants/predispute'] = 'sadministrator/merchants/predispute';
$route['sadministrator/merchants/partial-refund'] = 'sadministrator/merchants/partial_refund';
$route['sadministrator/merchants/withdraw-requested'] = 'sadministrator/merchants/withdraw_requested';
$route['sadministrator/merchants/withdraw-rolling'] = 'sadministrator/merchants/withdraw_rolling';
$route['sadministrator/merchants/fund'] = 'sadministrator/merchants/fund';
$route['sadministrator/merchants/recieve-fund'] = 'sadministrator/merchants/recieve_fund';
$route['sadministrator/merchants/sent-fund'] = 'sadministrator/merchants/sent_fund';
$route['sadministrator/merchants/frozen-balance'] = 'sadministrator/merchants/frozen_balance';
$route['sadministrator/merchants/frozen-rolling'] = 'sadministrator/merchants/frozen_rolling';
$route['sadministrator/merchants/expired'] = 'sadministrator/merchants/expired';
$route['sadministrator/merchants/cancelled'] = 'sadministrator/merchants/cancelled';
$route['sadministrator/merchants/allwithdraw'] = 'sadministrator/merchants/allwithdraw';
//Transactions
//Payments
$route['sadministrator/merchants/payments'] = 'sadministrator/merchants/payments';
$route['sadministrator/merchants/payments-deposits'] = 'sadministrator/merchants/payments_deposits';
$route['sadministrator/merchants/payments-withdrawals'] = 'sadministrator/merchants/payments_withdrawals';
//Payments
//Settlements
$route['sadministrator/merchants/settlements'] = 'sadministrator/merchants/getsettlements';
$route['sadministrator/merchants/all-settlements'] = 'sadministrator/merchants/getsettlements';
$route['sadministrator/merchants/pending-settlements'] = 'sadministrator/merchants/get_pending_settlements';
$route['sadministrator/merchants/success-settlements'] = 'sadministrator/merchants/get_success_settlements';
$route['sadministrator/merchants/failed-settlements'] = 'sadministrator/merchants/get_failed_settlements';
$route['sadministrator/merchants/disputed-settlements'] = 'sadministrator/merchants/get_failed_settlements';
//Settlements
//Refunds
$route['sadministrator/merchants/refunds'] = 'sadministrator/merchants/getrefunds';
$route['sadministrator/merchants/all-refunds'] = 'sadministrator/merchants/getrefunds';
$route['sadministrator/merchants/pending-refunds'] = 'sadministrator/merchants/get_pending_refunds';
$route['sadministrator/merchants/success-refunds'] = 'sadministrator/merchants/get_success_refunds';
$route['sadministrator/merchants/failed-refunds'] = 'sadministrator/merchants/get_failed_refunds';
$route['sadministrator/merchants/chargeback-refunds'] = 'sadministrator/merchants/get_disputed_refunds';
$route['sadministrator/merchants/reversed-refunds'] = 'sadministrator/merchants/get_reversed_refunds';
$route['sadministrator/merchants/refunded-refunds'] = 'sadministrator/merchants/get_refunded_refunds';
//Refunds
//Returns
$route['sadministrator/merchants/returns'] = 'sadministrator/merchants/getreturns';
$route['sadministrator/merchants/all-returns'] = 'sadministrator/merchants/getreturns';
$route['sadministrator/merchants/chargeback-returns'] = 'sadministrator/merchants/get_chargeback_returns';
$route['sadministrator/merchants/cancelled-returns'] = 'sadministrator/merchants/get_cancelled_returns';
$route['sadministrator/merchants/forwarded-returns'] = 'sadministrator/merchants/get_forwarded_returns';
$route['sadministrator/merchants/failed-returns'] = 'sadministrator/merchants/get_failed_returns';
//Returns
//Reports
$route['sadministrator/merchants/reports'] = 'sadministrator/merchants/getcustomers_reports';
$route['sadministrator/merchants/customers-reports'] = 'sadministrator/merchants/getcustomers_reports';
$route['sadministrator/merchants/api-reports'] = 'sadministrator/merchants/get_api_reports';
$route['sadministrator/merchants/transactions-reports'] = 'sadministrator/merchants/get_transactions_reports';
$route['sadministrator/merchants/payments-reports'] = 'sadministrator/merchants/get_payments_reports';
$route['sadministrator/merchants/orders-reports'] = 'sadministrator/merchants/get_orders_reports';
$route['sadministrator/merchants/refund-reports'] = 'sadministrator/merchants/get_refund_reports';
$route['sadministrator/merchants/login-ip'] = 'sadministrator/merchants/get_login_ip_reports';
//Reports
//Customers
$route['sadministrator/merchants/customers'] = 'sadministrator/merchants/getcustomers';
$route['sadministrator/merchants/customer-transactions'] = 'sadministrator/merchants/getustomer_transactions';
$route['sadministrator/merchants/customer-invoices'] = 'sadministrator/merchants/getustomer_invoices';
$route['sadministrator/merchants/customer-refund-requests'] = 'sadministrator/merchants/getustomer_refund';
$route['sadministrator/merchants/customer-grievances'] = 'sadministrator/merchants/getustomer_grievances';
//Customers

//Merchants-Menu

//Invoice-Menu
//Invoice
$route['sadministrator/invoice'] = 'sadministrator/invoice/index';
$route['sadministrator/invoice/index'] = 'sadministrator/invoice/index';
$route['sadministrator/invoice/zaffran'] = 'sadministrator/invoice/getzaffran_invoice';
$route['sadministrator/invoice/merchants'] = 'sadministrator/invoice/getmerchants_invoice';
$route['sadministrator/invoice/customers'] = 'sadministrator/invoice/getcustomers_invoice';
$route['sadministrator/invoice/gateways'] = 'sadministrator/invoice/getgateways_invoice';
//Invoice
//QRCodes
$route['sadministrator/invoice/qrcodes'] = 'sadministrator/invoice/qrcodes';
$route['sadministrator/invoice/zaffran-qrcodes'] = 'sadministrator/invoice/getzaffran_qrcodes';
$route['sadministrator/invoice/merchants-qrcodes'] = 'sadministrator/invoice/getmerchants_qrcodes';
$route['sadministrator/invoice/customers-qrcodes'] = 'sadministrator/invoice/getcustomers_qrcodes';
$route['sadministrator/invoice/gateways-qrcodes'] = 'sadministrator/invoice/getgateways_qrcodes';
//QRCodes
//QRCodes
$route['sadministrator/invoice/offer-coupons'] = 'sadministrator/invoice/offer-coupons';
$route['sadministrator/invoice/zaffran-offer-coupons'] = 'sadministrator/invoice/getzaffran_offer-coupons';
$route['sadministrator/invoice/merchants-offer-coupons'] = 'sadministrator/invoice/getmerchants_offer_coupons';
$route['sadministrator/invoice/gateways-offer-coupons'] = 'sadministrator/invoice/getgateways_offer-coupons';
//QRCodes
//Invoice-Menu

//Managers-Menu
//Managers
$route['sadministrator/managers'] = 'sadministrator/managers/index';
$route['sadministrator/managers/index'] = 'sadministrator/managers/index';
$route['sadministrator/managers/add-managers'] = 'sadministrator/managers/add_managers';
$route['sadministrator/managers/assign-tasks'] = 'sadministrator/managers/assign_tasks';
$route['sadministrator/managers/access-roles'] = 'sadministrator/managers/access_roles';
$route['sadministrator/managers/login-as-manager'] = 'sadministrator/managers/login_manager';
//Managers
//Managers-Menu

//Supervisors-Menu
//Supervisors
$route['sadministrator/supervisors'] = 'sadministrator/supervisors/index';
$route['sadministrator/supervisors/index'] = 'sadministrator/supervisors/index';
$route['sadministrator/supervisors/add-supervisor'] = 'sadministrator/supervisors/add_supervisor';
$route['sadministrator/supervisors/assign-tasks'] = 'sadministrator/supervisors/assign_tasks';
$route['sadministrator/supervisors/access-roles'] = 'sadministrator/supervisors/access_roles';
$route['sadministrator/supervisors/login-as-supervisor'] = 'sadministrator/supervisors/login_supervisor';
//Supervisors
//Supervisors-Menu

//Agents-Menu
//Agents
$route['sadministrator/agents'] = 'sadministrator/agents/index';
$route['sadministrator/agents/index'] = 'sadministrator/agents/index';
$route['sadministrator/agents/add-agent'] = 'sadministrator/agents/add_agents';
$route['sadministrator/agents/assign-tasks'] = 'sadministrator/agents/assign_tasks';
$route['sadministrator/agents/access-roles'] = 'sadministrator/agents/access_roles';
$route['sadministrator/agents/login-as-agents'] = 'sadministrator/agents/login_agents';
//Agents
//Agents-Menu

//Individuals-Menu
//Individuals
$route['sadministrator/individuals'] = 'sadministrator/individuals/index';
$route['sadministrator/individuals/index'] = 'sadministrator/individuals/index';
$route['sadministrator/individuals/transaction-summary'] = 'sadministrator/individuals/transaction_summary';
$route['sadministrator/individuals/login-as-individual'] = 'sadministrator/individuals/login_individuals';
//Individuals
//Individuals-Menu

//Accounts-Menu
//Accounts
$route['sadministrator/accounts'] = 'zadministrator/accounts/index';
$route['sadministrator/accounts/index'] = 'zadministrator/accounts/index';
$route['sadministrator/accounts/zaffran-banks'] = 'zadministrator/accounts/index';
$route['sadministrator/accounts/create-zaffran-bank-account'] = 'zadministrator/accounts/create';
$route['sadministrator/accounts/update-zaffran-bank-account'] = 'zadministrator/accounts/update';
$route['sadministrator/accounts/zaffran-crypto'] = 'zadministrator/accounts/zaffran_crypto';
$route['sadministrator/accounts/create-zaffran-crypto-account'] = 'zadministrator/accounts/create_zaffran_crypto';
$route['sadministrator/accounts/update-zaffran-crypto-account'] = 'zadministrator/accounts/update_zaffran_crypto';
$route['sadministrator/accounts/zaffran-wallets'] = 'zadministrator/accounts/zaffran_wallets';
$route['sadministrator/accounts/create-zaffran-wallets-account'] = 'zadministrator/accounts/create_zaffran_wallets';
$route['sadministrator/accounts/update-zaffran-wallets-account'] = 'zadministrator/accounts/update_zaffran_wallets';
$route['sadministrator/accounts/merchants-banks'] = 'zadministrator/accounts/merchants_banks';
$route['sadministrator/accounts/merchants-crypto'] = 'zadministrator/accounts/merchants_crypto';
$route['sadministrator/accounts/merchants-wallets'] = 'zadministrator/accounts/merchants_wallets';
//Accounts
//Accounts-Menu

//Accounting & Inventory-Menu
//Accounting & Inventory
$route['sadministrator/inventory'] = 'sadministrator/inventory/index';
$route['sadministrator/inventory/index'] = 'sadministrator/inventory/index';
$route['sadministrator/inventory/sales-invoice'] = 'sadministrator/inventory/sales_invoice';
$route['sadministrator/inventory/purchase-invoice'] = 'sadministrator/inventory/purchase_invoice';
$route['sadministrator/inventory/expenses'] = 'sadministrator/inventory/expenses';
$route['sadministrator/inventory/journals'] = 'sadministrator/inventory/journals';
$route['sadministrator/inventory/vouchers'] = 'sadministrator/inventory/vouchers';
$route['sadministrator/inventory/receipts'] = 'sadministrator/inventory/receipts';
$route['sadministrator/inventory/payments'] = 'sadministrator/inventory/payments';
$route['sadministrator/inventory/assets'] = 'sadministrator/inventory/assets';
$route['sadministrator/inventory/liabilities'] = 'sadministrator/inventory/liabilities';
$route['sadministrator/inventory/credits'] = 'sadministrator/inventory/credits';
$route['sadministrator/inventory/debits'] = 'sadministrator/inventory/debits';
$route['sadministrator/inventory/balancesheet'] = 'sadministrator/inventory/balancesheet';
//Accounting & Inventory
//Accounting & Inventory-Menu

//Reports-Menu
//Reports
$route['sadministrator/reports'] = 'sadministrator/reports/index';
$route['sadministrator/reports/index'] = 'sadministrator/reports/index';
$route['sadministrator/reports/sales-invoice'] = 'sadministrator/reports/sales_invoice';
$route['sadministrator/reports/purchase-invoice'] = 'sadministrator/reports/purchase_invoice';
$route['sadministrator/reports/expenses'] = 'sadministrator/reports/expenses';
$route['sadministrator/reports/journals'] = 'sadministrator/reports/journals';
$route['sadministrator/reports/vouchers'] = 'sadministrator/reports/vouchers';
$route['sadministrator/reports/receipts'] = 'sadministrator/reports/receipts';
$route['sadministrator/reports/payments'] = 'sadministrator/reports/payments';
$route['sadministrator/reports/assets'] = 'sadministrator/reports/assets';
$route['sadministrator/reports/liabilities'] = 'sadministrator/reports/liabilities';
$route['sadministrator/reports/credits'] = 'sadministrator/reports/credits';
$route['sadministrator/reports/debits'] = 'sadministrator/reports/debits';
$route['sadministrator/reports/balancesheet'] = 'sadministrator/reports/balancesheet';
//Reports

//Contracts & Agreements
$route['sadministrator/contracts'] = 'sadministrator/contracts/index';
$route['sadministrator/contracts/index'] = 'sadministrator/contracts/index';
$route['sadministrator/contracts/zaffranpsp-paymentgateway'] = 'sadministrator/contracts/zaffranpsp_paymentgateway';
$route['sadministrator/contracts/zaffranpsp-merchants'] = 'sadministrator/contracts/zaffranpsp_merchants';
$route['sadministrator/contracts/merchants-paymentgateway'] = 'sadministrator/contracts/merchants_paymentgateway';
$route['sadministrator/contracts/zaffranpsp-banks'] = 'sadministrator/contracts/zaffranpsp_banks';
$route['sadministrator/contracts/zaffranpsp-cryptos'] = 'sadministrator/contracts/zaffranpsp_cryptos';
$route['sadministrator/contracts/zaffranpsp-outlets'] = 'sadministrator/contracts/zaffranpsp_outlets';
//Contracts & Agreements

//Graphical Statistics
$route['sadministrator/statistics'] = 'sadministrator/statistics/index';
$route['sadministrator/statistics/index'] = 'sadministrator/statistics/index';
$route['sadministrator/statistics/graphical-statistics'] = 'sadministrator/statistics/index';
$route['sadministrator/statistics/transactions'] = 'sadministrator/statistics/transactions';
$route['sadministrator/statistics/profits'] = 'sadministrator/statistics/profits';
$route['sadministrator/statistics/merchants'] = 'sadministrator/statistics/merchants';
$route['sadministrator/statistics/expenses'] = 'sadministrator/statistics/expenses';
//Graphical Statistics

//Salt Management
$route['sadministrator/saltmanagement'] = 'sadministrator/saltmanagement/index';
$route['sadministrator/saltmanagement/index'] = 'sadministrator/saltmanagement/index';
$route['sadministrator/saltmanagement/saltmanagement'] = 'sadministrator/saltmanagement/index';
//Salt Management
//Reports-Menu

//Settings-Menu
//Settings
$route['sadministrator/settings'] = 'sadministrator/settings/index';
$route['sadministrator/settings/index'] = 'sadministrator/settings/index';
$route['sadministrator/settings/currency'] = 'sadministrator/settings/currency';
$route['sadministrator/settings/transaction-charges'] = 'sadministrator/settings/transaction_charges';
$route['sadministrator/settings/profit-logs'] = 'sadministrator/settings/profit_logs';
$route['sadministrator/settings/users'] = 'sadministrator/settings/users';
$route['sadministrator/settings/agents'] = 'sadministrator/settings/agents';
$route['sadministrator/settings/merchants'] = 'sadministrator/settings/merchants';
$route['sadministrator/settings/KYC-Form'] = 'sadministrator/settings/kyc_form';
$route['sadministrator/settings/KYC-Information'] = 'sadministrator/settings/kyc_information';
$route['sadministrator/settings/payment-gateways'] = 'sadministrator/settings/paymentgateways';
$route['sadministrator/settings/deposits'] = 'sadministrator/settings/deposits';
$route['sadministrator/settings/withdrawal'] = 'sadministrator/settings/withdrawal';
$route['sadministrator/settings/reports'] = 'sadministrator/settings/reports';
$route['sadministrator/settings/general-settings'] = 'sadministrator/settings/general_settings';
$route['sadministrator/settings/module-settings'] = 'sadministrator/settings/module_settings';
$route['sadministrator/settings/logo-favicon'] = 'sadministrator/settings/logo_favicon';
$route['sadministrator/settings/qrcode-template'] = 'sadministrator/settings/qrcode_template';
$route['sadministrator/settings/extensions'] = 'sadministrator/settings/extensions';
$route['sadministrator/settings/multi-languages'] = 'sadministrator/settings/multi_languages';
$route['sadministrator/settings/email-manager'] = 'sadministrator/settings/email_manager';
$route['sadministrator/settings/sms-manager'] = 'sadministrator/settings/sms_manager';
$route['sadministrator/settings/GDPR-cookie'] = 'sadministrator/settings/gdpr_cookie';
$route['sadministrator/settings/template-manager'] = 'sadministrator/settings/template_manager';
//Settings
//Users
$route['sadministrator/settingsuser'] = 'sadministrator/settingsuser/index';
$route['sadministrator/settingsuser/index'] = 'sadministrator/settingsuser/index';
$route['sadministrator/settingsuser/add-user'] = 'sadministrator/settingsuser/add-user';
$route['sadministrator/settingsuser/access-roles'] = 'sadministrator/settingsuser/access_roles';
//Users
//IP History
$route['sadministrator/settingsuser/master-admin'] = 'sadministrator/settingsuser/master_admin';
$route['sadministrator/settingsuser/admin-users'] = 'sadministrator/settingsuser/admin_users';
$route['sadministrator/settingsuser/managers'] = 'sadministrator/settingsuser/managers';
$route['sadministrator/settingsuser/supervisors'] = 'sadministrator/settingsuser/supervisors';
$route['sadministrator/settingsuser/agents'] = 'sadministrator/settingsuser/agents';
$route['sadministrator/settingsuser/merchants'] = 'sadministrator/settingsuser/merchants';
$route['sadministrator/settingsuser/customers'] = 'sadministrator/settingsuser/customers';
//IP History
//WorkNotes
$route['sadministrator/settingsuser/work-notes'] = 'sadministrator/settingsuser/worknotes';
$route['sadministrator/settingsuser/reminders'] = 'sadministrator/settingsuser/reminders';
//WorkNotes
//Settings-Menu

//Subscriptions & Plans-Menu
//Subscriptions & Plans
$route['sadministrator/subscriptions'] = 'sadministrator/subscriptions/index';
$route['sadministrator/subscriptions/index'] = 'sadministrator/subscriptions/index';
$route['sadministrator/subscriptions/add-subscription'] = 'sadministrator/subscriptions/add_subscription';
$route['sadministrator/subscriptions/remind-subscription'] = 'sadministrator/subscriptions/remind_subscription';
$route['sadministrator/subscriptions/renew-subscription'] = 'sadministrator/subscriptions/renew_subscription';
$route['sadministrator/subscriptions/add-plans'] = 'sadministrator/subscriptions/add_plans';
$route['sadministrator/subscriptions/current-plans'] = 'sadministrator/subscriptions/current_plans';
//Subscriptions & Plans
//Subscriptions & Plans-Menu

//Messages & Alerts-Menu
//Messages
$route['sadministrator/messages'] = 'sadministrator/messages/index';
$route['sadministrator/messages/index'] = 'sadministrator/messages/index';
$route['sadministrator/messages/registrations']= 'sadministrator/messages/registrations';
$route['sadministrator/messages/validations'] = 'sadministrator/messages/validations';
$route['sadministrator/messages/transactions'] = 'sadministrator/messages/transactions';
$route['sadministrator/messages/otp'] = 'sadministrator/messages/otp';
$route['sadministrator/messages/reminders'] = 'sadministrator/messages/reminders';
//Messages

//Alerts
$route['sadministrator/messages/alerts-paymentgateway']= 'sadministrator/messages/alerts_paymentgateway';
$route['sadministrator/messages/alerts-transactions']= 'sadministrator/messages/alerts_transactions';
$route['sadministrator/messages/alerts-stafflogin']= 'sadministrator/messages/alerts_stafflogin';
$route['sadministrator/messages/alerts-merchantlogin']= 'sadministrator/messages/alerts_merchantlogin';
$route['sadministrator/messages/alerts-deposit-limits']= 'sadministrator/messages/alerts_depositlimits';
$route['sadministrator/messages/alerts-withdraw-limits']= 'sadministrator/messages/alerts_withdrawlimits';
$route['sadministrator/messages/alerts-office-licences']= 'sadministrator/messages/alerts_office_licences';
$route['sadministrator/messages/alerts-IT-development']= 'sadministrator/messages/alerts_it_development';
$route['sadministrator/messages/alerts-digital-resources']= 'sadministrator/messages/alerts_digital_resources';
//Alerts

//Notifications
$route['sadministrator/messages/notification-registrations']= 'sadministrator/messages/notification_registrations';
$route['sadministrator/messages/notification-login']= 'sadministrator/messages/notification_login';
$route['sadministrator/messages/notification-validations'] = 'sadministrator/messages/notification_validations';
$route['sadministrator/messages/notification-renewal'] = 'sadministrator/messages/notification_renewal';
$route['sadministrator/messages/notification-transactions'] = 'sadministrator/messages/notification_transactions';
$route['sadministrator/messages/notification-refunds'] = 'sadministrator/messages/notification_refunds';
$route['sadministrator/messages/notification-api-integrations'] = 'sadministrator/messages/notification_api';
$route['sadministrator/messages/notification-otp'] = 'sadministrator/messages/notification_otp';
$route['sadministrator/messages/notification-reminders'] = 'sadministrator/messages/notification_reminders';
//Notifications
//Messages & Alerts-Menu

//Developer API-Menu
//Developer API
$route['sadministrator/developerapi'] = 'sadministrator/developerapi/index';
$route['sadministrator/developerapi/index'] = 'sadministrator/developerapi/index';
$route['sadministrator/developerapi/websites'] = 'sadministrator/developerapi/websites';
$route['sadministrator/developerapi/mobile-applications'] = 'sadministrator/developerapi/mobile_applications';
$route['sadministrator/developerapi/zaffran-test'] = 'sadministrator/developerapi/zaffran_test';
$route['sadministrator/developerapi/merchants-test'] = 'sadministrator/developerapi/merchants_test';
$route['sadministrator/developerapi/support-IDE'] = 'sadministrator/developerapi/support_ide';
//Developer API

//Developer Documentations
$route['sadministrator/developerdocumentation'] = 'sadministrator/developerdocumentation/index';
$route['sadministrator/developerdocumentation/index'] = 'sadministrator/developerdocumentation/index';
$route['sadministrator/developerdocumentation/websites'] = 'sadministrator/developerdocumentation/websites';
$route['sadministrator/developerdocumentation/mobile-applications'] = 'sadministrator/developerdocumentation/zaffran_test';
$route['sadministrator/developerdocumentation/merchants-test'] = 'sadministrator/developerdocumentation/merchants_test';
$route['sadministrator/developerdocumentation/support-IDE'] = 'sadministrator/developerdocumentation/support_ide';
//Developer Documentations

//Sample Pages
$route['sadministrator/developersamplepages'] = 'sadministrator/developersamplepages/index';
$route['sadministrator/developersamplepages/index'] = 'sadministrator/developersamplepages/index';
$route['sadministrator/developersamplepages/demo-websites'] = 'sadministrator/developersamplepages/demo_websites';
$route['sadministrator/developersamplepages/demo-mobileapps'] = 'sadministrator/developersamplepages/demo_mobileapps';
$route['sadministrator/developersamplepages/demo-zaffrantest'] = 'sadministrator/developersamplepages/demo_zaffrantest';
$route['sadministrator/developersamplepages/demo-merchanttest'] = 'sadministrator/developersamplepages/demo_merchanttest';
//Sample Pages

//Developer API-Menu

//Dispute & Grievance-Menu
//Dispute
$route['sadministrator/dispute'] = 'sadministrator/dispute/index';
$route['sadministrator/dispute/index'] = 'sadministrator/dispute/index';
$route['sadministrator/dispute/support-merchant-ticket'] = 'sadministrator/dispute/support_merchant_ticket';
$route['sadministrator/dispute/view-merchant-ticket'] = 'sadministrator/dispute/view_merchant_ticket';
$route['sadministrator/dispute/reply-merchant-ticket'] = 'sadministrator/dispute/reply_merchant_ticket';
$route['sadministrator/dispute/solve-merchant-ticket'] = 'sadministrator/dispute/solve_merchant_ticket';
$route['sadministrator/dispute/view-customer-ticket'] = 'sadministrator/dispute/view_customer_ticket';
$route['sadministrator/dispute/reply-customer-ticket'] = 'sadministrator/dispute/reply_customer_ticket';
//Dispute

//Grievance
$route['sadministrator/grievance'] = 'sadministrator/grievance/index';
$route['sadministrator/grievance/index'] = 'sadministrator/grievance/index';
$route['sadministrator/grievance/merchants'] = 'sadministrator/grievance/merchants';
$route['sadministrator/grievance/supervisors'] = 'sadministrator/grievance/supervisors';
$route['sadministrator/grievance/agents'] = 'sadministrator/grievance/agents';
$route['sadministrator/grievance/customers'] = 'sadministrator/grievance/customers';
$route['sadministrator/grievance/merchant-kyc'] = 'sadministrator/grievance/merchant_kyc';
$route['sadministrator/grievance/merchant-kyc-update'] = 'sadministrator/grievance/merchant_kyc_update';
$route['sadministrator/grievance/cards'] = 'sadministrator/grievance/cards';
$route['sadministrator/grievance/transactions'] = 'sadministrator/grievance/transactions';
$route['sadministrator/grievance/refunds'] = 'sadministrator/grievance/refunds';
$route['sadministrator/grievance/deposits'] = 'sadministrator/grievance/deposits';
$route['sadministrator/grievance/withdrawal'] = 'sadministrator/grievance/withdrawal';
//Grievance
//Dispute & Grievance-Menu

/*Sidebar Main Menu Ends here*/

/*candidhomes starts here*/
/*categories*/
$route['sadministrator/categories'] = 'sadministrator/categories';
/*categories*/
/*subcategory*/
$route['sadministrator/subcategories'] = 'sadministrator/subcategories';
$route['sadministrator/create-subcategories'] = 'sadministrator/create_subcategories';
$route['sadministrator/update-subcategories'] = 'sadministrator/update_subcategories';
$route['sadministrator/delete-subcategories'] = 'sadministrator/deletesubcategories';
$route['sadministrator/edit-subcategories'] = 'sadministrator/edit_subcategories';
/*subcategory*/
/*products*/
$route['sadministrator/products'] = 'sadministrator/products';
$route['sadministrator/create-products'] = 'sadministrator/create_products';
$route['sadministrator/update-products'] = 'sadministrator/update_products';
$route['sadministrator/delete-products'] = 'sadministrator/deleteproducts';
$route['sadministrator/edit-products/(:any)'] = 'sadministrator/edit_products/$1';
/*products*/
/*feedback*/
$route['sadministrator/feedback'] = 'sadministrator/feedback';
/*feedback*/

/*cusotmers*/
$route['sadministrator/customers'] = 'sadministrator/customers';
$route['sadministrator/create-customers'] = 'sadministrator/create_customers';
$route['sadministrator/update-customers'] = 'sadministrator/update_customers';
$route['sadministrator/delete-customers'] = 'sadministrator/deletecustomers';
$route['sadministrator/edit-customers'] = 'sadministrator/edit_customers';
/*cusotmers*/

/*address*/
$route['sadministrator/user-address'] = 'sadministrator/get_address';
$route['sadministrator/view-address'] = 'sadministrator/get_address';
$route['sadministrator/view-profile/(:any)'] = 'sadministrator/get_profile/$1';
$route['sadministrator/view-address/(:any)'] = 'sadministrator/view_address_single/$1';
/*address*/

/*sadministrators*/
$route['sadministrator/sadministrators'] = 'sadministrator/sadministrators';
$route['sadministrator/create-sadministrators'] = 'sadministrator/create_sadministrators';
$route['sadministrator/update-sadministrators'] = 'sadministrator/update_sadministrators';
$route['sadministrator/delete-sadministrators'] = 'sadministrator/deletesadministrators';
$route['sadministrator/edit-sadministrators'] = 'sadministrator/edit_sadministrators';
/*sadministrators*/

/*vendors*/
$route['sadministrator/vendors'] = 'sadministrator/vendors';
$route['sadministrator/create-vendors'] = 'sadministrator/create_vendors';
$route['sadministrator/update-vendors'] = 'sadministrator/update_vendors';
$route['sadministrator/delete-vendors'] = 'sadministrator/deletevendors';
$route['sadministrator/edit-vendors'] = 'sadministrator/edit_vendors';
/*vendors*/

/*leads*/
/*cleads*/
$route['sadministrator/leads'] = 'sadministrator/leads';
$route['sadministrator/create-leads'] = 'sadministrator/create_leads';
$route['sadministrator/update-leadsp'] = 'sadministrator/update_leadsp';
$route['sadministrator/update-leadsc'] = 'sadministrator/update_leadsc';
$route['sadministrator/process-leads/(:any)'] = 'sadministrator/process_leads/$1';
$route['sadministrator/edit-leads/(:any)'] = 'sadministrator/edit_leads/$1';

$route['sadministrator/meeting-tracker-view'] = 'sadministrator/meeting_tracker_view';
$route['sadministrator/meeting-tracker-add/(:any)'] = 'sadministrator/meeting_tracker_add/$1';
$route['sadministrator/meetingstracker/(:any)'] = 'sadministrator/get_meeting_tracker_single/$1';
//services
$route['sadministrator/leads-services'] = 'sadministrator/leads_services';
$route['sadministrator/edit-services/(:any)'] = 'sadministrator/edit_services/$1';
$route['sadministrator/update-services'] = 'sadministrator/update_services';
$route['sadministrator/create-services'] = 'sadministrator/create_services';
//services
//complaints
$route['sadministrator/leads-complaints'] = 'sadministrator/leads_complaints';
$route['sadministrator/edit-complaints/(:any)'] = 'sadministrator/edit_complaints/$1';
$route['sadministrator/update-complaints'] = 'sadministrator/update_complaints';
$route['sadministrator/create-complaints'] = 'sadministrator/create_complaints';
//complaints

/*cleads*/

$route['sadministrator/update-leads'] = 'sadministrator/update_leads';
$route['sadministrator/delete-leads'] = 'sadministrator/deleteleads';
$route['sadministrator/edit-leads'] = 'sadministrator/edit_leads';
$route['sadministrator/add-leadsfollowups'] = 'sadministrator/add_leadsfollowups';
$route['sadministrator/update-leadsmeasurements'] = 'sadministrator/update_leadsmeasurements';
$route['sadministrator/create-leadsmeasurements/(:any)'] = 'sadministrator/create_leadsmeasurements/$1';
$route['sadministrator/edit-leadsmeasurements/(:any)'] = 'sadministrator/edit_leadsmeasurements/$1';
$route['sadministrator/view-leadsmeasurements/(:any)'] = 'sadministrator/view_leadsmeasurements/$1';
$route['sadministrator/delete-leadsmeasurements'] = 'sadministrator/deleteleadsmeasurements';
/*leads*/
/*SALES-CPO*/
$route['sadministrator/view-leadquotes'] = 'sadministrator/leadquotes';
$route['sadministrator/viewsales-quotespdf/(:any)'] = 'sadministrator/viewsales_quotespdf/$1';
$route['sadministrator/edited-quotes-process/(:any)/(:any)'] = 'sadministrator/editedquotes_process/$1/$1';
$route['sadministrator/add-quotes-process/(:any)'] = 'sadministrator/addquotes_process/$1';
$route['sadministrator/view-quotes-process/(:any)/(:any)'] = 'sadministrator/viewleadquotes_process/$1/$1';
$route['sadministrator/update-leadquotes-process'] = 'sadministrator/update_leadquotes_process';

/*SALES-CPO*/

/*PURCHASE-ORDERS*/
$route['sadministrator/showroomrfp'] = 'sadministrator/showroomrfp';
$route['sadministrator/showroomrfp-process/(:any)'] = 'sadministrator/showroomrfp_process/$1';
$route['sadministrator/showroomrfpw'] = 'sadministrator/showroomrfpw';
/*PURCHASE-ORDERS*/
/*ACCOUNTING*/
$route['sadministrator/purchase'] = 'sadministrator/showpurchase';
$route['sadministrator/viewpurchase-payments/(:any)/(:any)'] = 'sadministrator/viewpurchase_payments/$1/$1';
$route['sadministrator/update-purchasepayment'] = 'sadministrator/update_purchasepayment';
$route['sadministrator/create-purchasepayment'] = 'sadministrator/create_purchasepayment';
$route['sadministrator/purchase-invoice'] = 'sadministrator/showpurchaseinvoice';
$route['sadministrator/update-purcbill'] = 'sadministrator/update_purcbill';
$route['sadministrator/sales-invoice'] = 'sadministrator/showsalesinvoice';
$route['sadministrator/viewsales-invoice/(:any)'] = 'sadministrator/viewsales_invoice/$1';
$route['sadministrator/viewsales-payments/(:any)/(:any)'] = 'sadministrator/viewsales_payments/$1/$1';

$route['sadministrator/update-salespayment'] = 'sadministrator/update_salespayment';
$route['sadministrator/create-salespayment'] = 'sadministrator/create_salespayment';
$route['sadministrator/viewsales-paymentspdf/(:any)/(:any)'] = 'sadministrator/viewsales_paymentspdf/$1/$1';


/*ACCOUNTING*/



/*orders*/
$route['sadministrator/orders'] = 'sadministrator/orders';
$route['sadministrator/create-orders'] = 'sadministrator/create_orders';
$route['sadministrator/update-orders'] = 'sadministrator/update_orders';
$route['sadministrator/delete-orders'] = 'sadministrator/deleteorders';
$route['sadministrator/edit-orders'] = 'sadministrator/edit_orders';
$route['sadministrator/add-ordersfollowups'] = 'sadministrator/add_ordersfollowups';
/*orders*/

/*assign*/
$route['sadministrator/assign'] = 'sadministrator/assign';
$route['sadministrator/create-assign'] = 'sadministrator/create_assign';
$route['sadministrator/update-assign'] = 'sadministrator/update_assign';
$route['sadministrator/delete-assign'] = 'sadministrator/deleteassign';
$route['sadministrator/edit-assign'] = 'sadministrator/edit_assign';
/*assign*/

/*workstatus*/
$route['sadministrator/workstatus'] = 'sadministrator/workstatus';
$route['sadministrator/create-workstatus'] = 'sadministrator/create_workstatus';
$route['sadministrator/update-workstatus'] = 'sadministrator/update_workstatus';
$route['sadministrator/delete-workstatus'] = 'sadministrator/deleteworkstatus';
$route['sadministrator/edit-workstatus'] = 'sadministrator/edit_workstatus';
/*workstatus*/

/*candidhomes ends here*/

//settings
$route['sadministrator/site-configuration'] = 'sadministrator/get_siteconfiguration';
$route['sadministrator/site-configuration/update/(:any)'] = 'sadministrator/update_siteconfiguration/$1';
//settings


$route['sadministrator/page-contents'] = 'sadministrator/get_pagecontents';
$route['sadministrator/page-contents/update/(:any)'] = 'sadministrator/update_pagecontents/$1';

$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;



