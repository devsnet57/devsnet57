<?php
session_start();

require 'includes/functions.php';

if (!authenticate()) {
    header("Location:login.php");
}

$deal_id = $_GET['dealId'];
$user_id = $_GET['user_id'];

$deal = fetch_deal_by_deal_id_db($deal_id)->fetch();
$sv = fetch_security_values_by_deal_id_db($deal_id);
$ext = fetch_extensions_by_deal_id_db($deal_id);
$lt = fetch_loan_type_by_deal_id_db($deal_id);

if (isset($_POST['lawyer-ref-horizontal'])) {
    edit_form($deal_id, $user_id);
}

?>


<?php
include "includes/header.php";
?>

  <div class="row mx-auto mt-5 pt-5" style="width: 90%">
    <div class="col-md-12">
      <form action="<?="edit-forum.php?dealId=" . $deal_id . "&user_id=" . $user_id?>" method="POST" novalidate="novalidate">
        <ul class="stepper horizontal" style="min-height: 2800px;" id="horizontal-stepper">
          <!-- STEP 1 -->
          <li class="step active">
            <div class="step-title waves-effect waves-dark">Loan Details</div>
            <div class="step-new-content">
              <div class="row">
                <div class="md-form col-6 ml-auto">
                  <input name="lawyer-ref-horizontal" type="text" class="validate form-control" value="<?=$deal['lawyerRef']?>" >
                  <label for="lawyer-ref-horizontal">Lawyer Ref.</label>
                </div>
                <div class="md-form col-6 ml-auto">
                  <input name="leading-entity-name-horizontal" type="text" class="validate form-control" value="<?=$deal['lendingEntityName']?>">
                  <label for="lawyer-ref-horizontal">Leading Entity Name</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-6 ml-auto">
                  <input name="gross-purchase-loan-horizontal" type="number" class="validate form-control" value="<?=$deal['grossPurchaseLoan']?>">
                  <label for="gross-purchase-loan-horizontal">Gross Purchase Loan (£)</label>
                </div>
                <div class="md-form col-6 ml-auto">
                  <input name="net-purchase-loan-horizontal" type="number" class="validate form-control" value="<?=$deal['netPurchaseLoan']?>">
                  <label for="net-purchase-loan-horizontal">Net Purchase Loan (£)</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-12 ml-auto">
                  <input name="gross-development-loan-horizontal" type="number" class="validate form-control" value="<?=$deal['grossDevelopmentLoan']?>">
                  <label for="gross-development-loan-horizontal">Gross Development Loan (£)</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-6 ml-auto">
                  <input name="net-development-loan-horizontal" type="number" class="validate form-control" value="<?=$deal['netDevelopmentLoan']?>">
                  <label for="net-development-loan-horizontal">Net Development Loan (£)</label>
                </div>
                <div class="md-form col-6 ml-auto">
                  <input name="monthly-interest-horizontal" type="number" class="validate form-control" value="<?=$deal['monthlyInterest']?>">
                  <label for="monthly-interest-horizontal">Monthly Interest (%)</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-6 ml-auto">
                  <input name="arrangment-fee-horizontal" type="number" class="validate form-control" value="<?=$deal['arrangmentFee']?>">
                  <label for="arrangment-fee-horizontal">Arrangment Fee (%)</label>
                </div>
                <div class="md-form col-6 ml-auto">
                  <input name="exit-fee-horizontal" type="number" class="validate form-control" value="<?=$deal['exitFee']?>">
                  <label for="exit-fee-horizontal">Exit Fee (%)</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-6 ml-auto">
                  <input name="loan-type-horizontal" type="text" class="validate form-control" value="<?=$deal['loanType']?>">
                  <label for="loan-type-horizontal">Loan Type</label>
                </div>
                <div class="md-form col-6 ml-auto">
                  <input name="retained-months-horizontal" type="number" class="validate form-control" value="<?=$deal['retainedMonths']?>">
                  <label for="retained-months-horizontal">Retained Months</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-6 ml-auto">
                  <input name="rolled-months-horizontal" type="number" class="validate form-control" value="<?=$deal['rolledMonths']?>">
                  <label for="rolled-months-horizontal">Rolled Months</label>
                </div>
                <div class="md-form col-6 ml-auto">
                  <input name="service-months-horizontal" type="number" class="validate form-control" value="<?=$deal['serviceMonths']?>">
                  <label for="service-months-horizontal">Service Months</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-6 ml-auto">
                  <input name="development-retained-months-horizontal" type="number" class="validate form-control" value="<?=$deal['developmentRetainedMonths']?>">
                  <label for="development-retained-months-horizontal">Development Retained Months</label>
                </div>
                <div class="md-form col-6 ml-auto">
                  <input name="development-rolled-months-horizontal" type="number" class="validate form-control" value="<?=$deal['developmentRolledMonths']?>">
                  <label for="development-rolled-months-horizontal">Development Rolled Months</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-12 ml-auto">
                  <input name="development-service-months-horizontal" type="number" class="validate form-control" value="<?=$deal['developmentServiceMonths']?>">
                  <label for="development-service-months-horizontal">Development Service Months</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-6 ml-auto">
                  <input name="min-term-months-horizontal" type="number" class="validate form-control" value="<?=$deal['minTerm']?>">
                  <label for="min-term-months-horizontal">Min Term Months</label>
                </div>
                <div class="md-form col-6 ml-auto">
                  <input name="max-loan-term-months-horizontal" type="number" class="validate form-control" value="<?=$deal['maxTerm']?>">
                  <label for="max-loan-term-months-horizontal">Max Loan Term Months</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-6 ml-auto">
                  <input name="legal-start-date-horizontal" type="date" class="validate form-control" value="<?=$deal['legalStartDate']?>">
                  <label for="legal-start-date-horizontal">Legal Start Date</label>
                </div>
                <div class="md-form col-6 ml-auto">
                  <input name="interest-start-date-horizontal" type="date" class="validate form-control" value="<?=$deal['interestStartDate']?>">
                  <label for="interest-start-date-horizontal">Interest Start Date</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-6 ml-auto">
                  <input name="max-date-horizontal" type="date" class="validate form-control" value="<?=$deal['maxDate']?>">
                  <label for="max-date-horizontal">Max Date</label>
                </div>
                <div class="md-form col-6 ml-auto">
                  <input name="radeemed-date-horizontal" type="date" class="validate form-control" value="<?=$deal['redeemedDate']?>">
                  <label for="radeemed-date-horizontal">Radeemed Date</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-6 ml-auto">
                  <input name="loan-to-value-horizontal" type="number" class="validate form-control" value="<?=$deal['loanToValue']?>">
                  <label for="loan-to-value-horizontal">Loan to Value (%)</label>
                </div>
                <div class="md-form col-6 ml-auto">
                  <input name="loan-to-cost-horizontal" type="number" class="validate form-control" value="<?=$deal['loanToCost']?>">
                  <label for="loan-to-cost-horizontal">Loan to Cost (%)</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-6 ml-auto">
                  <input name="loan-to-gross-development-value-horizontal" type="number" class="validate form-control" value="<?=$deal['loanToGrossDevelopmentValue']?>">
                  <label for="loan-to-gross-development-value-horizontal">Loan to Gross Development Value (%)</label>
                </div>
                <div class="md-form col-6 ml-auto">
                  <input name="loan-to-purchase-horizontal" type="number" class="validate form-control" value="<?=$deal['loanToPurchase']?>">
                  <label for="loan-to-purchase-horizontal">Loan to Purchase (%)</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-6 ml-auto">
                  <input name="broker-name-horizontal" type="text" class="validate form-control" value="<?=$deal['brokerName']?>">
                  <label for="broker-name-horizontal">Broker Name</label>
                </div>
                <div class="md-form col-6 ml-auto">
                  <input name="broker-email-horizontal" type="email" class="validate form-control" value="<?=$deal['brokerEmail']?>">
                  <label for="broker-email-horizontal">Broker Email</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-6 ml-auto">
                  <input name="broker-telephone-horizontal" type="tel" class="validate form-control" value="<?=$deal['brokerTelephone']?>">
                  <label for="broker-telephone-horizontal">Broker Telephone</label>
                </div>
                <div class="md-form col-6 ml-auto">
                  <input name="broker-mobile-number-horizontal" type="tel" class="validate form-control" value="<?=$deal['brokerMobile']?>">
                  <label for="broker-mobile-number-horizontal">Broker Mobile Number</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-6 ml-auto">
                  <input name="broker-fee-horizontal" type="number" class="validate form-control" value="<?=$deal['brokerFee']?>">
                  <label for="broker-fee-horizontal">Broker Fee</label>
                </div>
                <div class="md-form col-6 ml-auto">
                  <input name="senior-debt-horizontal" type="number" class="validate form-control" value="<?=$deal['seniorDebt']?>">
                  <label for="senior-horizontal">Senior Debt</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-12 ml-auto">
                  <input name="senior-lender-name-horizontal" type="text" class="validate form-control" value="<?=$deal['seniorLenderName']?>">
                  <label for="senior-lender-name-horizontal">Senior Lender Name</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-6 ml-auto">
                  <select name="chargeType" class="mdb-select md-form" value="<?=$deal['chargeType']?>" >
                    <option value="none" selected>Charge type</option>
                    <option value="one" <?="one" == $deal['chargeType'] ? "selected" : ""?>>One</option>
                    <option value="two"<?="two" == $deal['chargeType'] ? "selected" : ""?>>Two</option>
                    <option value="three"<?="three" == $deal['chargeType'] ? "selected" : ""?>>Three</option>
                  </select>
                </div>
                <div class="md-form col-6 ml-auto">
                  <select name="interestType" class="mdb-select md-form" value="<?=$deal['interestType']?>">
                    <option value="none" selected>Interest Type</option>
                    <option value="one" <?="one" == $deal['interestType'] ? "selected" : ""?>>One</option>
                    <option value="two"<?="two" == $deal['interestType'] ? "selected" : ""?>>Two</option>
                    <option value="three"<?="three" == $deal['interestType'] ? "selected" : ""?>>Three</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-6 ml-auto">
                  <select name="aipCreator" class="mdb-select md-form">
                    <option value="none" selected>AIP Creator</option>
                    <option value="maurice" <?="maurice" == $deal['aipCreator'] ? "selected" : ""?> >Maurice</option>
                    <option value="dani" <?="dani" == $deal['aipCreator'] ? "selected" : ""?> >Dani</option>
                    <option value="nikesh" <?="nikesh" == $deal['aipCreator'] ? "selected" : ""?>>Nikesh</option>
                    <option value="connor" <?="connor" == $deal['aipCreator'] ? "selected" : ""?> >Connor</option>
                    <option value="susan" <?="susan" == $deal['aipCreator'] ? "selected" : ""?> >Susan</option>
                    <option value="gittel" <?="gittel" == $deal['aipCreator'] ? "selected" : ""?>>Gittel</option>
                    <option value="ben" <?="ben" == $deal['aipCreator'] ? "selected" : ""?> >Ben</option>
                  </select>
                </div>
                <div class="md-form col-6 ml-auto">
                  <select name="loanManager" class="mdb-select md-form">
                    <option value="none" selected>Loan Manager</option>
                    <option value="maurice" <?="maurice" == $deal['loanManager'] ? "selected" : ""?> >Maurice</option>
                    <option value="dani" <?="dani" == $deal['loanManager'] ? "selected" : ""?> >Dani</option>
                    <option value="nikesh" <?="nikesh" == $deal['loanManager'] ? "selected" : ""?> >Nikesh</option>
                    <option value="connor" <?="connor" == $deal['loanManager'] ? "selected" : ""?> >Connor</option>
                    <option value="susan" <?="susan" == $deal['loanManager'] ? "selected" : ""?> >Susan</option>
                    <option value="gittel" <?="gittel" == $deal['loanManager'] ? "selected" : ""?> >Gittel</option>
                    <option value="ben" <?="ben" == $deal['loanManager'] ? "selected" : ""?> >Ben</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-12 ml-auto">
                  <select name="loanStatus" class="mdb-select md-form" value="<?=$deal['loanStatus']?>">
                    <option value="none" selected>Loan Status</option>
                    <option value="Discussion with client" <?="Discussion with client" == $deal['loanStatus'] ? "selected" : ""?>  >Discussion with client</option>
                    <option value="AIP given" <?="AIP given" == $deal['loanStatus'] ? "selected" : ""?>>AIP given</option>
                    <option value="valuation/Legals" <?="valuation/Legals" == $deal['loanStatus'] ? "selected" : ""?>>Valuation/Legals</option>
                    <option value="Active" <?="Active" == $deal['loanStatus'] ? "selected" : ""?>>Active</option>
                    <option value="Redeemed" <?="Redeemed" == $deal['loanStatus'] ? "selected" : ""?>>Redeemed</option>
                    <option value="Aborted" <?="Aborted" == $deal['loanStatus'] ? "selected" : ""?>>Aborted</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-12 ml-auto">
                  <textarea name="senior-debt-comment-horizontal" class="md-textarea form-control" rows="3"><?=$deal['seniorDebtComments']?></textarea>
                  <label for="senior-debt-comment-horizontal">Senior Debt Comments</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-12 ml-auto">
                  <textarea name="loan-background-comment-horizontal" class="md-textarea form-control" rows="3"><?=$deal['loanBackgroundComments']?></textarea>
                  <label for="loan-background-comment-horizontal">Loan Background Comments</label>
                </div>
              </div>
              <div class="row">
                  <button class="waves-effect waves-dark btn btn-primary next-step btn-rounded ml-auto" data-feedback="someFunction21" value="<?=$deal['lawyerRef']?>">CONTINUE</button>
              </div>
            </div>
          </li>
          <!-- STEP 2 -->
          <li class="step">
            <div class="step-title waves-effect waves-dark">Client Details</div>
            <div class="step-new-content">
              <div class="row">
                <div class="md-form col-6 ml-auto">
                  <input name="borrower-name-horizontal" type="text" class="validate form-control" value="<?=$deal['borrower']?>">
                  <label for="borrower-name-horizontal">Borrower Name</label>
                </div>
                <div class="md-form col-6 ml-auto">
                  <input name="company-name-horizontal" type="text" class="validate form-control" value="<?=$deal['companyNumber']?>">
                  <label for="company-name-horizontal">Company Name (If Applicable)</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-6 ml-auto">
                  <input name="flat-number-horizontal" type="number" class="validate form-control" value="<?=$deal['flatNumber']?>" >
                  <label for="flat-number-horizontal">Flat Number (If Applicable)</label>
                </div>
                <div class="md-form col-6 ml-auto">
                  <input name="street-number-horizontal" type="number" class="validate form-control"  value="<?=$deal['streetNumber']?>">
                  <label for="street-number-horizontal">Street Number</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-6 ml-auto">
                  <input name="building-name-horizontal" type="text" class="validate form-control" value="<?=$deal['buildingName']?>" >
                  <label for="building-name-horizontal">Building Name</label>
                </div>
                <div class="md-form col-6 ml-auto">
                  <input name="street-horizontal" type="text" class="validate form-control" value="<?=$deal['street']?>" >
                  <label for="street-horizontal">Street</label>
                </div>

              </div>
              <div class="row">
                <div class="md-form col-6 ml-auto">
                  <input name="city-horizontal" type="text" class="validate form-control" value="<?=$deal['cityTown']?>" >
                  <label for="city-horizontal">City/Town</label>
                </div>
                <div class="md-form col-6 ml-auto">
                  <input name="district-region-horizontal" type="text" class="validate form-control"  value="<?=$deal['districtRegion']?>">
                  <label for="district-region-horizontal">District Region</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-6 ml-auto">
                  <input name="postcode-horizontal" type="text" class="validate form-control" value="<?=$deal['postcode']?>" >
                  <label for="postcode-horizontal">Post Code</label>
                </div>
                <div class="md-form col-6 ml-auto">
                  <input name="telephone-number-client-horizontal" type="tel" class="validate form-control" value="<?=$deal['telephone']?>" >
                  <label for="telephone-number-client-horizontal">Telephone Number</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-6 ml-auto">
                  <input name="email-client-horizontal" type="email" class="validate form-control" value="<?=$deal['email']?>" >
                  <label for="email-client-horizontal">Email</label>
                </div>
                <div class="md-form col-6 ml-auto">
                  <input name="mobile-number-client-horizontal" type="tel" class="validate form-control"  value="<?=$deal['mobile']?>">
                  <label for="mobile-number-client-horizontal">Mobile Number</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-12 ml-auto">
                  <textarea name="experience-horizontal" class="md-textarea form-control" rows="3"><?=$deal['experience']?></textarea>
                  <!-- <input name="email-client-horizontal" type="email" class="validate form-control" > -->
                  <label for="experience-horizontal">Experience / Background Story of Loan</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-12 ml-auto">
                  <textarea name="exit-strategy-horizontal" class="md-textarea form-control" rows="3" ><?=$deal['exitStrategy']?></textarea>
                  <label for="exit-strategy-horizontal">Exit Strategy</label>
                </div>
              </div>
              <div class="row mb-4 d-flex justify-content-center">
                <div class="form-check col-4 ml-auto text-center">
                  <input type="checkbox" name="creditCheck" value="checked1" class="form-check-input" id="materialUnchecked1" value="<?=$deal['creditCheck']?>">
                  <label class="form-check-label" for="materialUnchecked1">Credit Check</label>
                </div>
                <div class="form-check col-4 ml-auto text-center">
                  <input type="checkbox" name="kyc" value="checked2" class="form-check-input" id="materialUnchecked2" value="<?=$deal['kyc']?>">
                  <label class="form-check-label" for="materialUnchecked2">Kyc</label>
                </div>
                <div class="form-check col-4 ml-auto text-center">
                  <input type="checkbox" name="al" value="checked3" class="form-check-input" id="materialUnchecked3" value="<?=$deal['al']?>">
                  <label class="form-check-label" for="materialUnchecked3">A&L</label>
                </div>
              </div>
              <div class="row mt-4">
                <!-- <div class="step-actions"> -->
                  <button class="waves-effect waves-dark btn btn-primary next-step btn-rounded ml-auto" data-feedback="someFunction21">CONTINUE</button>
                  <button class="waves-effect waves-dark btn btn-warning btn-rounded previous-step">BACK</button>
                <!-- </div> -->
              </div>
            </div>
          </li>

          <!-- STEP 3 -->
          <li class="step">
            <div class="step-title waves-effect waves-dark">Security Value</div>

            <div class="step-new-content" id="security-value-step">

            <div class="security-value__add d-flex justify-content-center hover my-4">
              <i class="fas fa-plus-circle text-primary fa-3x security-value__add-btn"></i>
            </div>

            <div class="security-value__container">

            <?php $counter = 0;foreach ($sv as $row): ?>

            <div class="security-value__content">
                        <div class="row">
                        <div class="md-form col-6 ml-auto">
                            <input name="<?="security-values[$counter]"?>[flat-number]" type="number" class="validate form-control" value="<?=$row['flatNumber']?>" >
                            <label for="flat-number-horizontal2">Flat Number</label>
                        </div>
                        <div class="md-form col-6 ml-auto">
                            <input name="<?="security-values[$counter]"?>[street-number]" type="number" class="validate form-control"  value="<?=$row['streetNumber']?>" >
                            <label for="street-number-horizontal2">Street Number</label>
                        </div>
                        </div>
                        <div class="row">
                        <div class="md-form col-6 ml-auto">
                            <input name="<?="security-values[$counter]"?>[building-name]" type="text" class="validate form-control" value="<?=$row['buildingName']?>"  >
                            <label for="building-name-horizontal2">Building Name</label>
                        </div>
                        <div class="md-form col-6 ml-auto">
                            <input name="<?="security-values[$counter]"?>[street]" type="tel" class="validate form-control" value="<?=$row['street']?>"  >
                            <label for="street-horizontal2">Street</label>
                        </div>
                        </div>
                        <div class="row">
                        <div class="md-form col-6 ml-auto">
                            <input name="<?="security-values[$counter]"?>[city-town]" type="text" class="validate form-control" value="<?=$row['cityTown']?>"  >
                            <label for="city-town-horizontal2">City/Town</label>
                        </div>
                        <div class="md-form col-6 ml-auto">
                            <input name="<?="security-values[$counter]"?>[district-region]" type="text" class="validate form-control" value="<?=$row['districtRegion']?>" >
                            <label for="district-region-horizontal2">District Region</label>
                        </div>
                        </div>
                        <div class="row">
                        <div class="md-form col-6 ml-auto">
                            <input name="<?="security-values[$counter]"?>[post-code]" type="text" class="validate form-control" value="<?=$row['postcode']?>"  >
                            <label for="post-code-horizontal">Postcode</label>
                        </div>
                        <div class="md-form col-6 ml-auto">
                            <input name="<?="security-values[$counter]"?>[title-number]" type="text" class="validate form-control" value="<?=$row['titleNumber']?>"  >
                            <label for="title-number-horizontal">Title Number</label>
                        </div>
                        </div>
                        <div class="row">
                        <div class="md-form col-6 ml-auto">
                            <input name="<?="security-values[$counter]"?>[leasehold-years-hold]" type="number" class="validate form-control" value="<?=$row['leaseholdYearsLeft']?>"  >
                            <label for="leasehold-years-hold-horizontal">Leasehold Years Left</label>
                        </div>
                        <div class="md-form col-6 ml-auto">
                            <input name="<?="security-values[$counter]"?>[property-type]" type="text" class="validate form-control" value="<?=$row['propertyType']?>"  >
                            <label for="property-type-horizontal">Property Type</label>
                        </div>
                        </div>
                        <div class="row">
                        <div class="md-form col-6 ml-auto">
                            <input name="<?="security-values[$counter]"?>[description]" type="text" class="validate form-control" value="<?=$row['descriptionD']?>"  >
                            <label for="description-horizontal">Description</label>
                        </div>
                        <div class="md-form col-6 ml-auto">
                            <input name="<?="security-values[$counter]"?>[purchase-price]" type="number" class="validate form-control" value="<?=$row['purchasePrice']?>"  >
                            <label for="purchase-price-horizontal">Purchase Price (£)</label>
                        </div>
                        </div>
                        <div class="row">
                        <div class="md-form col-6 ml-auto">
                            <input name="<?="security-values[$counter]"?>[market-value]" type="number" class="validate form-control" value="<?=$row['marketValue']?>"  >
                            <label for="market-value-horizontal">Market Value (£)</label>
                        </div>
                        <div class="md-form col-6 ml-auto">
                            <input name="<?="security-values[$counter]"?>[180-day-value]" type="number" class="validate form-control" value="<?=$row['dayValue180']?>"  >
                            <label for="180-day-value-horizontal">180 Day Value (£)</label>
                        </div>
                        </div>
                        <div class="row">
                        <div class="md-form col-6 ml-auto">
                            <input name="<?="security-values[$counter]"?>[90-day-value]" type="number" class="validate form-control"  value="<?=$row['90dayValue']?>" >
                            <label for="90-day-value-horizontal">90 Day Value (£)</label>
                        </div>
                        <div class="md-form col-6 ml-auto">
                            <input name="<?="security-values[$counter]"?>[gross-development-value]" type="number" class="validate form-control"  value="<?=$row['grossDevelopmentValue']?>" >
                            <label for="gross-development-value-horizontal">Gross Development Value (£)</label>
                        </div>
                        </div>
                        <div class="row">
                        <div class="md-form col-6 ml-auto">
                            <input name="<?="security-values[$counter]"?>[date-valued]" type="date" class="validate form-control"  value="<?=$row['dateValued']?>" >
                            <label for="date-valued-horizontal">Date Valued</label>
                        </div>
                        <div class="md-form col-6 ml-auto">
                            <input name="<?="security-values[$counter]"?>[valuer-name]" type="text" class="validate form-control" value="<?=$row['valuerName']?>"  >
                            <label for="valuer-name-horizontal">Valuer Name</label>
                        </div>
                        </div>
                        <div class="row">
                        <div class="md-form col-12 ml-auto">
                            <select name="<?="security-values[$counter]"?>[country]" class="mdb-select md-form" value="<?=$counter['country']?>">
                                <option value="pakistan" <?="pakistan" == $row['country'] ? "selected" : ""?>>Pakistan</option>
                                <option value="uk" <?="uk" == $row['country'] ? "selected" : ""?>>UK</option>
                                <option value="usa" <?="usa" == $row['country'] ? "selected" : ""?>>USA</option>
                                <option value="palestine" <?="palestine" == $row['country'] ? "selected" : ""?>>Palestine</option>
                                <option value="india" <?="india" == $row['country'] ? "selected" : ""?>>India</option>
                            </select>
                        </div>
                        </div>
                        <!-- <div class="row">
                        <div class="md-form col-12 ml-auto">
                            <select name="<?="security-values[$counter]"?>[leasehold]" class="mdb-select md-form" value="<?=$counter['securityValues']?>">
                                <option value="leasehold" <?="leasehold" == $row['leasehold'] ? "selected" : ""?>>Leasehold</option>
                                <option value="freehold" <?="leasehold" == $row['freehold'] ? "selected" : ""?>>Freehold</option>
                            </select>
                        </div>
                        </div> -->
                    </div>

                    <?php endforeach;?>

            </div>




            <div class="row">
                <!-- <div class="step-actions"> -->
                  <button class="waves-effect waves-dark btn btn-primary next-step btn-rounded ml-auto" data-feedback="someFunction21">CONTINUE</button>
                  <button class="waves-effect waves-dark btn btn-warning btn-rounded previous-step">BACK</button>
                  <!-- <button class="waves-effect waves-dark btn-sm btn btn-primary m-0 mt-4" type="button">SUBMIT</button> -->
                  <!-- </div> -->
              </div>
            </div>
          </li>
          <!-- STEP 4 -->
          <li class="step">
            <div class="step-title waves-effect waves-dark">Extensions</div>
            <div class="step-new-content">

            <div class="d-flex justify-content-center hover my-4 extensions__add">
                <i class="fas fa-plus-circle text-primary fa-3x extensions__add-btn"></i>
              </div>

                <div class="extensions__container">

                <?php $counter = 0;foreach ($ext as $row): ?>

                <div class="extensions__content">
                        <div class="row">
                        <div class="md-form col-6 ml-auto">
                            <input name="<?="extensions[$counter][extension]"?>" type="number" class="validate form-control" value="<?=$row['extension']?>">
                            <label for="extension-horizontal">Extension</label>
                        </div>
                        <div class="md-form col-6 ml-auto">
                            <input name="<?="extensions[$counter][fee]"?>" type="text" class="validate form-control"value="<?=$row['extFee']?>">
                            <label for="ext-horizontal">Ext. Fee (%)</label>
                        </div>
                        </div>
                        <div class="row">
                        <div class="md-form col-12 ml-auto">
                            <textarea name="<?="extensions[$counter][comments]"?>" class="md-textarea form-control" rows="3"><?=$row['comments']?></textarea>
                            <label for="comments-horizontal">Comments</label>
                        </div>
                        </div>

                    </div>

                    <?php $counter++;?>

                <?php endforeach;?>

                </div>

              <div class="row mt-4">
                <!-- <div class="step-actions"> -->
                  <button class="waves-effect waves-dark btn btn-primary next-step btn-rounded ml-auto" data-feedback="someFunction21">CONTINUE</button>
                  <button class="waves-effect waves-dark btn btn-warning btn-rounded previous-step">BACK</button>
                <!-- </div> -->
              </div>
            </div>
          </li>
          <!-- STEP 5 -->
          <li class="step">
            <div class="step-title waves-effect waves-dark">Loan Type</div>
            <div class="step-new-content">

              <div class="d-flex justify-content-center hover my-4 loan__add">
                <i class="fas fa-plus-circle text-primary fa-3x loan__add-btn"></i>
              </div>
            <div class="loan__container">
            <?php $counter = 0;foreach ($lt as $row): ?>
             <div class="loan__content">
                <select  name="<?="loan[$counter][type]"?>" class="browser-default custom-select mb-4 border-left-0 border-right-0 border-top-0" >
                <option value="none">Type</option>
                    <option value="drawdown" <?="drawdown" == $row['type'] ? "selected" : ""?>>Drawdown</option>
                    <option value="further advance" <?="further advance" == $row['type'] ? "selected" : ""?>>Further Advance</option>
                    <option value="redemption0" <?="redemption0" == $row['type'] ? "selected" : ""?>>Redemption</option>
                    <option value="fee" <?="fee" == $row['type'] ? "selected" : ""?>>Fee</option>
                    <option value="deduction" <?="deduction" == $row['type'] ? "selected" : ""?>>Deduction</option>
                </select>

                <div class="row">
                <div class="md-form col-6 ml-auto">
                    <input name="<?="loan[$counter][type]"?>" type="number" class="validate form-control" value=<?=$row['amount']?>>
                    <label for="amount-horizontal">Amount (£)</label>
                </div>
                <div class="md-form col-6 ml-auto">
                    <input name="<?="loan[$counter][date]"?>" type="date" class="validate form-control" value=<?=$row['dateD']?>>
                    <label for="date-horizontal">Date</label>
                </div>
                </div>
                <div class="row">
                <div class="md-form col-12 ml-auto">
                    <textarea name="<?="loan[$counter][comments]"?>" class="md-textarea form-control" rows="3" ><?=$row['comments']?></textarea>
                    <label for="comments-horizontal2">Comments</label>
                </div>
                </div>

              </div>

            <?php endforeach;?>


            </div>


              <div class="row mt-4">
                <!-- <div class="step-actions"> -->
                  <button class="waves-effect waves-dark btn btn-primary next-step btn-rounded ml-auto" data-feedback="someFunction21">CONTINUE</button>
                  <button class="waves-effect waves-dark btn btn-warning btn-rounded previous-step">BACK</button>
                <!-- </div> -->
              </div>



            </div>
          </li>
          <!-- STEP 6 -->
          <li class="step">
            <div class="step-title waves-effect waves-dark">Investor Details</div>
            <div class="step-new-content">
              <div class="row">
                <div class="md-form col-6 ml-auto">
                  <input name="investor-horizontal" type="text" class="validate form-control" value="<?=$deal['investor']?>">
                  <label for="investor-horizontal">Investor</label>
                </div>
                <div class="md-form col-6 ml-auto">
                  <input name="invested-amount-horizontal" type="number" class="validate form-control" value="<?=$deal['investedAmount']?>">
                  <label for="invested-amount-horizontal">Invested Amount</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-6 ml-auto">
                  <input name="date-horizontal2" type="date" class="validate form-control" value="<?=$deal['date2']?>">
                  <label for="date-horizontal2">Date</label>
                </div>
                <div class="md-form col-6 ml-auto">
                  <input name="rate-of-return-horizontal" type="number" class="validate form-control" value="<?=$deal['rateOfReturn']?>">
                  <label for="rate-of-return-amount-horizontal">Rate of Return (%)</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-12 ml-auto">
                  <textarea name="comments-horizontal3" class="md-textarea form-control" rows="3"><?=$deal['comments3']?></textarea>
                  <!-- <input id="extension-horizontal" type="number" class="validate form-control"> -->
                  <label for="comments-horizontal3">Comments</label>
                </div>
              </div>
              <div class="row mt-4">
                <!-- <div class="step-actions"> -->
                  <a class="waves-effect waves-dark btn btn-primary btn-rounded ml-auto" type="submit" name="save" role="button" aria-label="submit form" href="javascript:void(0)" onclick="document.querySelector('form').submit()">Update</a>
                <!-- </div> -->
              </div>
            </div>
          </li>
        </ul>
      </form>
    </div>
  </div>
  <!-- /.Horizontal Steppers -->



  <!-- jQuery -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Stepper JavaScript -->
  <script type="text/javascript" src="js/addons-pro/steppers.js"></script>
  <!-- Stepper JavaScript - minified -->
  <script type="text/javascript" src="js/addons-pro/steppers.min.js"></script>

  <script src="js/script.js"></script>

  <!-- Custom Scripts -->
  <script>
    $(document).ready(function () {
      $('.stepper').mdbStepper();
      $('.mdb-select').materialSelect();
    })

    function someFunction21() {
      setTimeout(function () {
        $('#horizontal-stepper').nextStep();
      }, 100);
    }

    function someFunction() {
      $.ajax({
        url: 'submit.php',
        success: function(data) {
          alert('Directory created');
        }
      });
    }
  </script>
</body>
</html>

