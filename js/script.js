$(document).ready(function () {
  // Dynamic Creation Of Fields Of Secrutiy Values

  const renderSecurityValueHTML = () => {
    const currentLength = $(".security-value__content").length;

    const securityValueHTML = $(`<div class="security-value__content">
    <div class="row">
      <div class="md-form col-6 ml-auto">
        <input name="security-values[${currentLength}][flat-number]" type="number" class="validate form-control" >
        <label for="flat-number-horizontal2">Flat Number</label>
      </div>
      <div class="md-form col-6 ml-auto">
        <input name="security-values[${currentLength}][street-number]" type="number" class="validate form-control" >
        <label for="street-number-horizontal2">Street Number</label>
      </div>
    </div>
    <div class="row">
      <div class="md-form col-6 ml-auto">
        <input name="security-values[${currentLength}][building-name]" type="text" class="validate form-control" >
        <label for="building-name-horizontal2">Building Name</label>
      </div>
      <div class="md-form col-6 ml-auto">
        <input name="security-values[${currentLength}][street]" type="tel" class="validate form-control" >
        <label for="street-horizontal2">Street</label>
      </div>
    </div>
    <div class="row">
      <div class="md-form col-6 ml-auto">
        <input name="security-values[${currentLength}][city-town]" type="text" class="validate form-control" >
        <label for="city-town-horizontal2">City/Town</label>
      </div>
      <div class="md-form col-6 ml-auto">
        <input name="security-values[${currentLength}][district-region]" type="text" class="validate form-control" >
        <label for="district-region-horizontal2">District Region</label>
      </div>
    </div>
    <div class="row">
      <div class="md-form col-6 ml-auto">
        <input name="security-values[${currentLength}][post-code]" type="text" class="validate form-control" >
        <label for="post-code-horizontal">Postcode</label>
      </div>
      <div class="md-form col-6 ml-auto">
        <input name="security-values[${currentLength}][title-number]" type="text" class="validate form-control" >
        <label for="title-number-horizontal">Title Number</label>
      </div>
    </div>
    <div class="row">
      <div class="md-form col-6 ml-auto">
        <input name="security-values[${currentLength}][leasehold-years-hold]" type="number" class="validate form-control" >
        <label for="leasehold-years-hold-horizontal">Leasehold Years Left</label>
      </div>
      <div class="md-form col-6 ml-auto">
        <input name="security-values[${currentLength}][property-type]" type="text" class="validate form-control" >
        <label for="property-type-horizontal">Property Type</label>
      </div>
    </div>
    <div class="row">
      <div class="md-form col-6 ml-auto">
        <input name="security-values[${currentLength}][description]" type="text" class="validate form-control" >
        <label for="description-horizontal">Description</label>
      </div>
      <div class="md-form col-6 ml-auto">
        <input name="security-values[${currentLength}][purchase-price]" type="number" class="validate form-control" >
        <label for="purchase-price-horizontal">Purchase Price (£)</label>
      </div>
    </div>
    <div class="row">
      <div class="md-form col-6 ml-auto">
        <input name="security-values[${currentLength}][market-value]" type="number" class="validate form-control" >
        <label for="market-value-horizontal">Market Value (£)</label>
      </div>
      <div class="md-form col-6 ml-auto">
        <input name="security-values[${currentLength}][180-day-value]" type="number" class="validate form-control" >
        <label for="180-day-value-horizontal">180 Day Value (£)</label>
      </div>
    </div>
    <div class="row">
      <div class="md-form col-6 ml-auto">
        <input name="security-values[${currentLength}][90-day-value]" type="number" class="validate form-control" >
        <label for="90-day-value-horizontal">90 Day Value (£)</label>
      </div>
      <div class="md-form col-6 ml-auto">
        <input name="security-values[${currentLength}][gross-development-value]" type="number" class="validate form-control" >
        <label for="gross-development-value-horizontal">Gross Development Value (£)</label>
      </div>
    </div>
    <div class="row">
      <div class="md-form col-6 ml-auto">
        <input name="security-values[${currentLength}][date-valued]" type="date" class="validate form-control" >
        <label for="date-valued-horizontal">Date Valued</label>
      </div>
      <div class="md-form col-6 ml-auto">
        <input name="security-values[${currentLength}][valuer-name]" type="text" class="validate form-control" >
        <label for="valuer-name-horizontal">Valuer Name</label>
      </div>
    </div>
    <div class="row">
      <div class="md-form col-12 ml-auto">
        <select name="security-values[${currentLength}][country]" class="mdb-select md-form">
          <option value="none" selected>Countries</option>
          <option value="pakistan">Pakistan</option>
          <option value="uk">UK</option>
          <option value="usa">USA</option>
          <option value="palestine">Palestine</option>
          <option value="india">India</option>
        </select>
      </div>        
    </div>
    <div class="row">
      <div class="md-form col-12 ml-auto">
        <select name="security-values[${currentLength}][leasehold]" class="mdb-select md-form">
          <option value="leasehold">Leasehold</option>
          <option value="freehold">Freehold</option>
  >
        </select>
      </div>        
    </div>

  </div>`);
    const removeButton = $(`
      <div class="d-flex justify-content-center security-value__remove hover">
      <i class="fas fa-times-circle fa-3x text-danger security-value__remove-btn"></i>
    </div>
    `).on("click", function () {
      $(this).parent().remove();
    });

    securityValueHTML.append(removeButton);

    return securityValueHTML;
  };

  $(".security-value__add-btn").on("click", function () {
    $(".security-value__container").prepend(renderSecurityValueHTML());
  });

  // Creating Dynamic Inputs For Extensions Step

  const renderExtensionHTML = () => {
    const currentLength = $(".extensions__content").length;

    const extensionsHTML = $(`
    <div class="extensions__content">
    <div class="row">
      <div class="md-form col-6 ml-auto">
        <input name="extensions[${currentLength}][extension]" type="number" class="validate form-control">
        <label for="extension-horizontal">Extension</label>
      </div>
      <div class="md-form col-6 ml-auto">
        <input name="extensions[${currentLength}][fee]" type="text" class="validate form-control">
        <label for="ext-horizontal">Ext. Fee (%)</label>
      </div>
    </div>
    <div class="row">
      <div class="md-form col-12 ml-auto">
        <textarea name="extensions[${currentLength}][comments]" class="md-textarea form-control" rows="3"></textarea>
        <!-- <input name="extension-horizontal" type="number" class="validate form-control"> -->
        <label for="comments-horizontal">Comments</label>
      </div>
    </div>

 
  
  </div>`);

    const removeButton = $(`
    <div class="d-flex justify-content-center extensions__remove hover">
    <i class="fas fa-times-circle fa-3x text-danger extensions__remove-btn"></i>
  </div>
`).on("click", function () {
      $(this).parent().remove();
    });

    extensionsHTML.append(removeButton);

    return extensionsHTML;
  };

  $(".extensions__add-btn").on("click", function () {
    $(".extensions__container").prepend(renderExtensionHTML());
  });

  //Creating Dynamic Inputs For Loan Step

  const renderLoanTypeHTML = () => {
    const currentLength = $(".loan__content").length;

    const loanTypeHTML = $(`
    <div class="loan__content">
    <select  name="loan[${currentLength}][type]" class="browser-default custom-select mb-4 border-left-0 border-right-0 border-top-0">
      <option value="none" selected>Type</option>
          <option value="drawdown">Drawdown</option>
          <option value="further advance">Further Advance</option>
          <option value="redemption0">Redemption</option>
          <option value="fee">Fee</option>
          <option value="deduction">Deduction</option>
    </select>

    <div class="row">
      <div class="md-form col-6 ml-auto">
        <input name="loan[${currentLength}][amount]" type="number" class="validate form-control">
        <label for="amount-horizontal">Amount (£)</label>
      </div>
      <div class="md-form col-6 ml-auto">
        <input name="loan[${currentLength}][date]" type="date" class="validate form-control">
        <label for="date-horizontal">Date</label>
      </div>
    </div>
    <div class="row">
      <div class="md-form col-12 ml-auto">
        <textarea name="loan[${currentLength}][comments]" class="md-textarea form-control" rows="3"></textarea>
        <!-- <input id="loan-horizontal" type="number" class="validate form-control"> -->
        <label for="comments-horizontal2">Comments</label>
      </div>
    </div>


  </div>
    
    `);

    const removeButton = $(`
          <div class="d-flex justify-content-center hover loan__remove my-2">
          <i class="fas fa-times-circle fa-3x text-danger loan__remove-btn"></i>
        </div>
`).on("click", function () {
      $(this).parent().remove();
    });

    loanTypeHTML.append(removeButton);

    return loanTypeHTML;
  };

  $(".loan__add-btn").on("click", function () {
    $(".loan__container").prepend(renderLoanTypeHTML());
  });
});
