<?php
session_start();

require 'includes/functions.php';

if (!authenticate()) {
    header("Location:login.php");
}

?>


<?php
include "includes/header.php";
?>

  <div class="row mx-auto mt-5 pt-5" style="width: 90%">
    <div class="col-md-12">

      <?php require "includes/messages.php"?>

      <form action="submit-forum.php" method="POST" novalidate="novalidate">
        <ul class="stepper horizontal linear" style="min-height: 2800px;" id="horizontal-stepper">
          <!-- STEP 1 -->
          <li class="step active">
            <div class="step-title waves-effect waves-dark">Loan Details</div>
            <div class="step-new-content">
              <div class="row">
                <div class="md-form col-6 ml-auto">
                  <input name="lawyer-ref-horizontal" id="lawyer-ref-horizontal" type="text" class="validate form-control" required>
                  <label for="lawyer-ref-horizontal">Lawyer Ref.</label>
                </div>
                <div class="md-form col-6 ml-auto">
                  <input name="leading-entity-name-horizontal" type="text" class="validate form-control" required>
                  <label for="lawyer-ref-horizontal">Leading Entity Name</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-6 ml-auto">
                  <input name="gross-purchase-loan-horizontal" type="number" class="validate form-control" required>
                  <label for="gross-purchase-loan-horizontal">Gross Purchase Loan (£)</label>
                </div>
                <div class="md-form col-6 ml-auto">
                  <input name="net-purchase-loan-horizontal" type="number" class="validate form-control" required>
                  <label for="net-purchase-loan-horizontal">Net Purchase Loan (£)</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-12 ml-auto">
                  <input name="gross-development-loan-horizontal" type="number" class="validate form-control" required>
                  <label for="gross-development-loan-horizontal">Gross Development Loan (£)</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-6 ml-auto">
                  <input name="net-development-loan-horizontal" type="number" class="validate form-control" required>
                  <label for="net-development-loan-horizontal">Net Development Loan (£)</label>
                </div>
                <div class="md-form col-6 ml-auto">
                  <input name="monthly-interest-horizontal" type="number" class="validate form-control" required>
                  <label for="monthly-interest-horizontal">Monthly Interest (%)</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-6 ml-auto">
                  <input name="arrangment-fee-horizontal" type="number" class="validate form-control" required>
                  <label for="arrangment-fee-horizontal">Arrangment Fee (%)</label>
                </div>
                <div class="md-form col-6 ml-auto">
                  <input name="exit-fee-horizontal" type="number" class="validate form-control" required>
                  <label for="exit-fee-horizontal">Exit Fee (%)</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-6 ml-auto">
                  <input name="loan-type-horizontal" type="text" class="validate form-control" required>
                  <label for="loan-type-horizontal">Loan Type</label>
                </div>
                <div class="md-form col-6 ml-auto">
                  <input name="retained-months-horizontal" type="number" class="validate form-control" required>
                  <label for="retained-months-horizontal">Retained Months</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-6 ml-auto">
                  <input name="rolled-months-horizontal" type="number" class="validate form-control" required>
                  <label for="rolled-months-horizontal">Rolled Months</label>
                </div>
                <div class="md-form col-6 ml-auto">
                  <input name="service-months-horizontal" type="number" class="validate form-control" required>
                  <label for="service-months-horizontal">Service Months</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-6 ml-auto">
                  <input name="development-retained-months-horizontal" type="number" class="validate form-control" required>
                  <label for="development-retained-months-horizontal">Development Retained Months</label>
                </div>
                <div class="md-form col-6 ml-auto">
                  <input name="development-rolled-months-horizontal" type="number" class="validate form-control" required>
                  <label for="development-rolled-months-horizontal">Development Rolled Months</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-12 ml-auto">
                  <input name="development-service-months-horizontal" type="number" class="validate form-control" required>
                  <label for="development-service-months-horizontal">Development Service Months</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-6 ml-auto">
                  <input name="min-term-months-horizontal" type="number" class="validate form-control" required>
                  <label for="min-term-months-horizontal">Min Term Months</label>
                </div>
                <div class="md-form col-6 ml-auto">
                  <input name="max-loan-term-months-horizontal" type="number" class="validate form-control" required>
                  <label for="max-loan-term-months-horizontal">Max Loan Term Months</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-6 ml-auto">
                  <input name="legal-start-date-horizontal" type="date" class="validate form-control" required>
                  <label for="legal-start-date-horizontal">Legal Start Date</label>
                </div>
                <div class="md-form col-6 ml-auto">
                  <input name="interest-start-date-horizontal" type="date" class="validate form-control" required>
                  <label for="interest-start-date-horizontal">Interest Start Date</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-6 ml-auto">
                  <input name="max-date-horizontal" type="date" class="validate form-control" required>
                  <label for="max-date-horizontal">Max Date</label>
                </div>
                <div class="md-form col-6 ml-auto">
                  <input name="radeemed-date-horizontal" type="date" class="validate form-control" required>
                  <label for="radeemed-date-horizontal">Radeemed Date</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-6 ml-auto">
                  <input name="loan-to-value-horizontal" type="number" class="validate form-control" required>
                  <label for="loan-to-value-horizontal">Loan to Value (%)</label>
                </div>
                <div class="md-form col-6 ml-auto">
                  <input name="loan-to-cost-horizontal" type="number" class="validate form-control" required>
                  <label for="loan-to-cost-horizontal">Loan to Cost (%)</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-6 ml-auto">
                  <input name="loan-to-gross-development-value-horizontal" type="number" class="validate form-control" required>
                  <label for="loan-to-gross-development-value-horizontal">Loan to Gross Development Value (%)</label>
                </div>
                <div class="md-form col-6 ml-auto">
                  <input name="loan-to-purchase-horizontal" type="number" class="validate form-control" required>
                  <label for="loan-to-purchase-horizontal">Loan to Purchase (%)</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-6 ml-auto">
                  <input name="broker-name-horizontal" type="text" class="validate form-control" required>
                  <label for="broker-name-horizontal">Broker Name</label>
                </div>
                <div class="md-form col-6 ml-auto">
                  <input name="broker-email-horizontal" type="email" class="validate form-control" required>
                  <label for="broker-email-horizontal">Broker Email</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-6 ml-auto">
                  <input name="broker-telephone-horizontal" type="tel" class="validate form-control" required>
                  <label for="broker-telephone-horizontal">Broker Telephone</label>
                </div>
                <div class="md-form col-6 ml-auto">
                  <input name="broker-mobile-number-horizontal" type="tel" class="validate form-control" required>
                  <label for="broker-mobile-number-horizontal">Broker Mobile Number</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-6 ml-auto">
                  <input name="broker-fee-horizontal" type="number" class="validate form-control" required>
                  <label for="broker-fee-horizontal">Broker Fee</label>
                </div>
                <div class="md-form col-6 ml-auto">
                  <input name="senior-debt-horizontal" type="number" class="validate form-control" required>
                  <label for="senior-horizontal">Senior Debt</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-12 ml-auto">
                  <input name="senior-lender-name-horizontal" type="text" class="validate form-control" required>
                  <label for="senior-lender-name-horizontal">Senior Lender Name</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-6 ml-auto">
                  <select name="chargeType" class="mdb-select md-form validate" required>
                    <option value="none" selected>Charge type</option>
                    <option value="one">One</option>
                    <option value="two">Two</option>
                    <option value="three">Three</option>
                  </select>
                </div>
                <div class="md-form col-6 ml-auto">
                  <select name="interestType" class="mdb-select md-form">
                    <option value="none" selected>Interest Type</option>
                    <option value="one">One</option>
                    <option value="two">Two</option>
                    <option value="three">Three</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-6 ml-auto">
                  <select name="aipCreator" class="mdb-select md-form">
                    <option value="none" selected>AIP Creator</option>
                    <option value="maurice">Maurice</option>
                    <option value="dani">Dani</option>
                    <option value="nikesh">Nikesh</option>
                    <option value="connor">Connor</option>
                    <option value="susan">Susan</option>
                    <option value="gittel">Gittel</option>
                    <option value="ben">Ben</option>
                  </select>
                </div>
                <div class="md-form col-6 ml-auto">
                  <select name="loanManager" class="mdb-select md-form">
                    <option value="none" selected>Loan Manager</option>
                    <option value="maurice">Maurice</option>
                    <option value="dani">Dani</option>
                    <option value="nikesh">Nikesh</option>
                    <option value="connor">Connor</option>
                    <option value="susan">Susan</option>
                    <option value="gittel">Gittel</option>
                    <option value="ben">Ben</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-12 ml-auto">
                  <select name="loanStatus" class="mdb-select md-form">
                    <option value="none" selected>Loan Status</option>
                    <option value="Discussion with client"  >Discussion with client</option>
                    <option value="AIP given">AIP given</option>
                    <option value="valuation/Legals">Valuation/Legals</option>
                    <option value="Active">Active</option>
                    <option value="Redeemed">Redeemed</option>
                    <option value="Aborted">Aborted</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-12 ml-auto">
                  <textarea name="senior-debt-comment-horizontal" class="md-textarea form-control validate" rows="3" required></textarea>
                  <!-- <input id="senior-debt-comment-horizontal" type="text" class="validate form-control"> -->
                  <label for="senior-debt-comment-horizontal">Senior Debt Comments</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-12 ml-auto">
                  <textarea name="loan-background-comment-horizontal" class="md-textarea form-control validate" rows="3" required></textarea>
                  <!-- <input id="loan-background-comment-horizontal" type="text" class="validate form-control"> -->
                  <label for="loan-background-comment-horizontal">Loan Background Comments</label>
                </div>
              </div>
              <div class="row">
                <!-- <div class="step-actions"> -->
                  <button class="waves-effect waves-dark btn btn-info next-step btn-rounded ml-auto" data-feedback="someFunction21">Next</button>
                <!-- </div> -->
              </div>
            </div>
          </li>
          <!-- STEP 2 -->
          <li class="step">
            <div class="step-title waves-effect waves-dark">Client Details</div>
            <div class="step-new-content">
              <div class="row">
                <div class="md-form col-6 ml-auto">
                  <input name="borrower-name-horizontal" type="text" class="validate form-control" required>
                  <label for="borrower-name-horizontal">Borrower Name</label>

                </div>
                <div class="md-form col-6 ml-auto">
                  <input name="company-name-horizontal" type="text" class="validate form-control" required>
                  <label for="company-name-horizontal">Company Name (If Applicable)</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-6 ml-auto">
                  <input name="flat-number-horizontal" type="number" class="validate form-control" required >
                  <label for="flat-number-horizontal">Flat Number (If Applicable)</label>
                </div>
                <div class="md-form col-6 ml-auto">
                  <input name="street-number-horizontal" type="number" class="validate form-control" required >
                  <label for="street-number-horizontal">Street Number</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-6 ml-auto">
                  <input name="building-name-horizontal" type="text" class="validate form-control" required >
                  <label for="building-name-horizontal">Building Name</label>
                </div>
                <div class="md-form col-6 ml-auto">
                  <input name="street-horizontal" type="text" class="validate form-control" required >
                  <label for="street-horizontal">Street</label>
                </div>

              </div>
              <div class="row">
                <div class="md-form col-6 ml-auto">
                  <input name="city-horizontal" type="text" class="validate form-control" required >
                  <label for="city-horizontal">City/Town</label>
                </div>
                <div class="md-form col-6 ml-auto">
                  <input name="district-region-horizontal" type="text" class="validate form-control" required >
                  <label for="district-region-horizontal">District Region</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-6 ml-auto">
                  <input name="postcode-horizontal" type="text" class="validate form-control" required >
                  <label for="postcode-horizontal">Post Code</label>
                </div>
                <div class="md-form col-6 ml-auto">
                  <input name="telephone-number-client-horizontal" type="tel" class="validate form-control" required >
                  <label for="telephone-number-client-horizontal">Telephone Number</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-6 ml-auto">
                  <input name="email-client-horizontal" type="email" class="validate form-control" required >
                  <label for="email-client-horizontal">Email</label>
                </div>
                <div class="md-form col-6 ml-auto">
                  <input name="mobile-number-client-horizontal" type="tel" class="validate form-control" required >
                  <label for="mobile-number-client-horizontal">Mobile Number</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-12 ml-auto">
                  <textarea name="experience-horizontal" class="md-textarea form-control" rows="3"></textarea>
                  <!-- <input name="email-client-horizontal" type="email" class="validate form-control" > -->
                  <label for="experience-horizontal">Experience / Background Story of Loan</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-12 ml-auto">
                  <textarea name="exit-strategy-horizontal" class="md-textarea form-control" rows="3"></textarea>
                  <label for="exit-strategy-horizontal">Exit Strategy</label>
                </div>
              </div>
              <div class="row mb-4 d-flex justify-content-center">
                <div class="form-check col-4 ml-auto text-center">
                  <input type="checkbox" name="creditCheck" value="checked1" class="form-check-input"  id="materialUnchecked1">
                  <label class="form-check-label" for="materialUnchecked1">Credit Check</label>
                </div>
                <div class="form-check col-4 ml-auto text-center">
                  <input type="checkbox" name="kyc" value="checked2" class="form-check-input"  id="materialUnchecked2">
                  <label class="form-check-label" for="materialUnchecked2">Kyc</label>
                </div>
                <div class="form-check col-4 ml-auto text-center">
                  <input type="checkbox" name="al" value="checked3" class="form-check-input"  id="materialUnchecked3">
                  <label class="form-check-label" for="materialUnchecked3">A&L</label>
                </div>
              </div>
              <div class="row mt-4">
                <!-- <div class="step-actions"> -->
                <button class="waves-effect waves-dark btn btn-warning btn-rounded previous-step">Back</button>
                  <button class="waves-effect waves-dark btn btn-info next-step btn-rounded ml-auto" data-feedback="someFunction21">Next</button>

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
            </div>




            <div class="row">
                <!-- <div class="step-actions"> -->

                  <button class="waves-effect waves-dark btn btn-warning btn-rounded previous-step">Back</button>
                  <button class="waves-effect waves-dark btn btn-info next-step btn-rounded ml-auto" data-feedback="someFunction21">Next</button>
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
                </div>

              <div class="row mt-4">
                <!-- <div class="step-actions"> -->

                  <button class="waves-effect waves-dark btn btn-warning btn-rounded previous-step">Back</button>
                  <button class="waves-effect waves-dark btn btn-info next-step btn-rounded ml-auto" data-feedback="someFunction21">Next</button>
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

            </div>


              <div class="row mt-4">
                <!-- <div class="step-actions"> -->

                  <button class="waves-effect waves-dark btn btn-warning btn-rounded previous-step">Back</button>
                  <button class="waves-effect waves-dark btn btn-info next-step btn-rounded ml-auto" data-feedback="someFunction21">Next</button>
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
                  <input name="investor-horizontal" type="text" class="validate form-control" required>
                  <label for="investor-horizontal">Investor</label>
                </div>
                <div class="md-form col-6 ml-auto">
                  <input name="invested-amount-horizontal" type="number" class="validate form-control" required>
                  <label for="invested-amount-horizontal">Invested Amount</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-6 ml-auto">
                  <input name="date-horizontal2" type="date" class="validate form-control" required>
                  <label for="date-horizontal2">Date</label>
                </div>
                <div class="md-form col-6 ml-auto">
                  <input name="rate-of-return-horizontal" type="number" class="validate form-control" required>
                  <label for="rate-of-return-amount-horizontal">Rate of Return (%)</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-12 ml-auto">
                  <textarea name="comments-horizontal3" class="md-textarea form-control" rows="3"></textarea>
                  <!-- <input id="extension-horizontal" type="number" class="validate form-control" required> -->
                  <label for="comments-horizontal3">Comments</label>
                </div>
              </div>
              <div class="row mt-4">
                <!-- <div class="step-actions"> -->
                  <a class="waves-effect waves-dark btn btn-info btn-lg btn-rounded ml-auto" type="submit" name="save" role="button" aria-label="submit form" href="javascript:void(0)" onclick="document.querySelector('form').submit()">Submit</a>
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
    <!-- Stepper JavaScript -->
    <script type="text/javascript" src="js/addons-pro/steppers.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>

  <!-- Stepper JavaScript - minified -->
  <!-- <script type="text/javascript" src="js/addons-pro/steppers.min.js"></script> -->

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

