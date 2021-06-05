<?php

require "includes/db.php";


function authorize($roles){
    if(isset($_SESSION['user'])){
        return in_array($_SESSION['user']['role'],$roles);
    }
    return false;
}

function authenticate(){
    return isset($_SESSION['user']);
}

function still_active () {    
    if ((time() - $_SESSION['lastLogin']) < 600) {

        $_SESSION['lastLogin'] = time();
        return true;

    } else {

        header("Location:logout.php");
        return false;
    }
}

function find_user_with_email($email){
    global $conn;

    $stmt = $conn->prepare("SELECT * from users WHERE email = :email");
    $stmt->bindValue(':email',$email);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}

function sign_up_user($data){
    global $conn;

    $first_name = $data['first_name'];
    $last_name = $data['last_name'];
    $email = $data['email'];
    $password  = $data['password'];
    $confirm_password = $data['confirm_password'];
    $role = isset($data['role'])?$data['role']:"";

    if(empty($first_name) || empty($last_name)  || empty($email) || empty($password) || empty($confirm_password) || empty($role)) return $_SESSION['error'] = "Please fill input fields";
    
    else if($password != $confirm_password) return $_SESSION['error'] = "Password and Confirm Password must be same";

    else if(find_user_with_email($email)) return $_SESSION['error'] = "User with the email already exists";

    else{
        $sql = "INSERT INTO users(first_name,last_name,email,password,role) values(:first_name,:last_name,:email,:password,:role)";
        $stmt = $conn->prepare($sql);
    
        $stmt->bindValue(':first_name',$first_name);
        $stmt->bindValue(':last_name',$last_name);
        $stmt->bindValue(':email',$email);
        $stmt->bindValue(':password',md5($password));
        $stmt->bindValue(':role',$role);
       
    
        $stmt->execute();
    }

    $_SESSION['success'] = "Congratulations! You successfully Signed Up Please Login To Continue";
    $_SESSION['lastLogin'] = time();

}

function login_user($data){
    $email = $data['email'];
    $password  = $data['password'];

    $user = find_user_with_email($email);

    if(!$user) return $_SESSION['error'] = "Email is incorrect";
    if($user['password'] != md5($password)) return $_SESSION['error'] = "Password is incorrect";

    $_SESSION['user'] = $user;
    $_SESSION['lastLogin'] = time();

    header("Location:forum.php");

}

function fetch_dashboard_stats_db(){
    global $conn;

    $sql = "SELECT 
                u.id,
                dealId,
                loanStatus,
                legalStartDate,
                maxDate,
                case 
                    when redeemedDate = NULL then 0 
                else
                    EXTRACT(DAY FROM NOW()) - EXTRACT(DAY FROM maxDate)
                end as daysActive,
                case 
                    when redeemedDate = NULL then 0
                else
                    EXTRACT(MONTH FROM NOW()) - EXTRACT(MONTH FROM maxDate)
                end as monthsActive,
                EXTRACT(DAY FROM maxDate) - EXTRACT(DAY FROM NOW()) as 'daysExpiry',
                redeemedDate
            FROM form_data
            JOIN users u
            on u.id = form_data.user_id";

    return $conn->query($sql);
}

function fetch_all_deals_db(){
    global $conn;

    $sql = "SELECT dealId,concat(u.first_name,'',u.last_name) as dealCreator,fd.dealName,fd.borrower,fd.loanManager,fd.loanStatus
            FROM form_data fd 
            JOIN users u on u.id = fd.user_id;";
    return $conn->query($sql);
}

function fetch_deal_by_deal_id_db($deal_id){
    global $conn;

    $sql = "SELECT * FROM form_data
            WHERE dealId = $deal_id;";
    return $conn->query($sql);
}

function fetch_security_values_by_deal_id_db($deal_id){
    global $conn;

    $sql = "SELECT * FROM security_values 
            WHERE form_data_id = $deal_id;";
    return $conn->query($sql);
}

function fetch_extensions_by_deal_id_db($deal_id){
    global $conn;

    $sql = "SELECT * FROM extensions
            WHERE form_data_id = $deal_id;";
    return $conn->query($sql);
}

function fetch_loan_type_by_deal_id_db($deal_id){
    global $conn;

    $sql = "SELECT * FROM loan_type
            WHERE form_data_id = $deal_id;";
    return $conn->query($sql);
}

function fetch_investors_by_deal_id_db($deal_id){
    global $conn;

    $sql = "SELECT * FROM investors
            WHERE form_data_id = $deal_id;";

    return $conn->query($sql);
}

function delete_previous_record($deal_id) {
    global $conn;

    $sql = "DELETE FROM security_values where form_data_id = $deal_id;
            DELETE FROM loan_type WHERE form_data_id = $deal_id;
            DELETE FROM extensions WHERE form_data_id = $deal_id;
            DELETE FROM form_data WHERE dealId = $deal_id;";

    return $conn->query($sql);
}




function create_client_and_loan_details_db($user_id){
    global $conn;

      // Loan Details Start

      $lawyerRef =  $_POST['lawyer-ref-horizontal'];
      $leadingEntityNameHorizontal = $_POST['leading-entity-name-horizontal'];
      $grossPurchaseLoanHorizontal =  $_POST['gross-purchase-loan-horizontal'];
      $netPurchaseLoanHorizontal = $_POST['net-purchase-loan-horizontal'];
      $grossDevelopmentLoanHorizontal = $_POST['gross-development-loan-horizontal'];
      $netDevelopmentLoanHorizontal = $_POST['net-development-loan-horizontal'];
      $monthlyInterestHorizontal = $_POST['monthly-interest-horizontal'];
      $arrangmentFeeHorizontal = $_POST['arrangment-fee-horizontal'];
      $exitFeeHorizontal = $_POST['exit-fee-horizontal'];
      $loanTypeHorizontal = $_POST['loan-type-horizontal'];
      $retainedMonthsHorizontal = $_POST['retained-months-horizontal'];
      $rolledMonthsHorizontal = $_POST['rolled-months-horizontal'];
      $serviceMonthsHorizontal = $_POST['service-months-horizontal'];
      $developmentRetainedMonthsHorizontal = $_POST['development-retained-months-horizontal'];
      $developmentRolledMonthsHorizontal = $_POST['development-rolled-months-horizontal'];
      $developmentServiceMonthsHorizontal = $_POST['development-service-months-horizontal'];
      $minTermMonthsHorizontal = $_POST['min-term-months-horizontal'];
      $maxLoanTermMonthsHorizontal = $_POST['max-loan-term-months-horizontal'];
      $legalStartDateHorizontal = $_POST['legal-start-date-horizontal'];
      $interestStartDateHorizontal = $_POST['interest-start-date-horizontal'];
      $maxDateHorizontal = $_POST['max-date-horizontal'];
      $radeemedDateHorizontal = $_POST['radeemed-date-horizontal'];
      $loanToValueHorizontal = $_POST['loan-to-value-horizontal'];
      $loanToCostHorizontal = $_POST['loan-to-cost-horizontal'];
      $loanToGrossDevelopmentValueHorizontal = $_POST['loan-to-gross-development-value-horizontal'];
      $loanToPurchaseHorizontal = $_POST['loan-to-purchase-horizontal'];
      $brokerNameHorizontal = $_POST['broker-name-horizontal'];
      $brokerEmailHorizontal = $_POST['broker-email-horizontal'];
      $brokerTelephoneHorizontal = $_POST['broker-telephone-horizontal'];
      $brokerMobileNumberHorizontal = $_POST['broker-mobile-number-horizontal'];
      $brokerFeeHorizontal = $_POST['broker-fee-horizontal'];
      $seniorDebtHorizontal = $_POST['senior-debt-horizontal'];
      $seniorLenderNameHorizontal = $_POST['senior-lender-name-horizontal'];
      $seniorDebtCommentHorizontal = $_POST['senior-debt-comment-horizontal'];
      $loanBackgroundCommentHorizontal = $_POST['loan-background-comment-horizontal'];
      $chargeType = $_POST['chargeType'];
      $loanStatus = $_POST['loanStatus'];
      $interestType = $_POST['interestType'];
      $aipCreator = $_POST['aipCreator'];
      $loanManager = $_POST['loanManager'];
  
  
      // Loan Details End
  
  
      // Client Details Start
  
      $borrowerNameHorizontal = $_POST['borrower-name-horizontal'];
      $companyNameHorizontal = $_POST['company-name-horizontal'];
      $flatNumberHorizontal = $_POST['flat-number-horizontal'];
      $streetNumberHorizontal = $_POST['street-number-horizontal'];
      $buildingNameHorizontal = $_POST['building-name-horizontal'];
      $streetHorizontal = $_POST['street-horizontal'];
      $cityHorizontal = $_POST['city-horizontal'];
      $districtRegionHorizontal = $_POST['district-region-horizontal'];
      $postcodeHorizontal = $_POST['postcode-horizontal'];
      $telephoneNumberClientHorizontal = $_POST['telephone-number-client-horizontal'];
      $emailClientHorizontal = $_POST['email-client-horizontal'];
      $mobileNumberClientHorizontal = $_POST['mobile-number-client-horizontal'];
      $experienceHorizontal = $_POST['experience-horizontal'];
      $exitStrateygHorizontal = $_POST['exit-strategy-horizontal'];
      $creditCheck = isset($_POST['creditCheck'])?$_POST['creditCheck']:false;
      $kyc = isset($_POST['kyc'])?$_POST['kyc']:false;
      $al = isset($_POST['al'])?$_POST['al']:false;
  
      // Client Details End

      // Loan Type Details Start



      $dealName = $_POST['deal-name-horizontal'];

      // Loan Type Details End

      $query = "INSERT INTO form_data (
        lawyerRef, 
        lendingEntityName,
        grossPurchaseLoan,
        netPurchaseLoan,
        grossDevelopmentLoan,
        netDevelopmentLoan,
        monthlyInterest,
        arrangmentFee,
        exitFee,
        loanType,
        loanBackgroundComments,
        retainedMonths,
        rolledMonths,
        serviceMonths,
        developmentRetainedMonths,
        developmentRolledMonths,
        developmentServiceMonths,
        minTerm,
        maxTerm,
        legalStartDate,
        interestStartDate,
        maxDate,
        redeemedDate,
        loanToValue,
        loanToCost,
        loanToGrossDevelopmentValue,
        loanToPurchase,
        brokerName,
        brokerTelephone,
        brokerMobile,
        brokerEmail,
        brokerFee,
        seniorDebt,
        seniorDebtComments,
        seniorLenderName,
        borrower,
        companyNumber,
        flatNumber,
        streetNumber,
        buildingName,
        street,
        cityTown,
        districtRegion,
        postcode,
        telephone,
        mobile,
        email,
        experience,
        exitStrategy,
        creditCheck,
        kyc,
        al,
        chargeType,
        interestType,
        aipCreator,
        loanManager,
        loanStatus,
        user_id,
        dealName
       ) 
      VALUES(
        '$lawyerRef', 
        '$leadingEntityNameHorizontal',
        '$grossPurchaseLoanHorizontal',
        '$netPurchaseLoanHorizontal',
        '$grossDevelopmentLoanHorizontal',
        '$netDevelopmentLoanHorizontal',
        '$monthlyInterestHorizontal',
        '$arrangmentFeeHorizontal',
        '$exitFeeHorizontal',
        '$loanTypeHorizontal',
        '$loanBackgroundCommentHorizontal',
        '$retainedMonthsHorizontal',
        '$rolledMonthsHorizontal',
        '$serviceMonthsHorizontal',
        '$developmentRetainedMonthsHorizontal',
        '$developmentRolledMonthsHorizontal',
        '$developmentServiceMonthsHorizontal',
        '$minTermMonthsHorizontal',
        '$maxLoanTermMonthsHorizontal',
        '$legalStartDateHorizontal',
        '$interestStartDateHorizontal',
        '$maxDateHorizontal',
        '$radeemedDateHorizontal',
        '$loanToValueHorizontal',
        '$loanToCostHorizontal',
        '$loanToGrossDevelopmentValueHorizontal',
        '$loanToPurchaseHorizontal',
        '$brokerNameHorizontal',
        '$brokerTelephoneHorizontal',
        '$brokerMobileNumberHorizontal',
        '$brokerEmailHorizontal',
        '$brokerFeeHorizontal',
        '$seniorDebtHorizontal',
        '$seniorDebtCommentHorizontal',
        '$seniorLenderNameHorizontal',
        '$borrowerNameHorizontal',
        '$companyNameHorizontal',
        '$flatNumberHorizontal',
        '$streetNumberHorizontal',
        '$buildingNameHorizontal',
        '$streetHorizontal',
        '$cityHorizontal',
        '$districtRegionHorizontal',
        '$postcodeHorizontal',
        '$telephoneNumberClientHorizontal',
        '$mobileNumberClientHorizontal',
        '$emailClientHorizontal',
        '$experienceHorizontal',
        '$exitStrateygHorizontal',
        '$creditCheck',
        '$kyc',
        '$al',
        '$chargeType',
        '$interestType',
        '$aipCreator',
        '$loanManager',
        '$loanStatus',
        '$user_id',
        '$dealName'
   )";
    $conn->query($query); 

    return $conn->lastInsertId();

}

function create_form_data_security_value_db($form_id){
    global $conn;

    $security_values = isset($_POST['security-values'])?$_POST['security-values']:null;
    if(!$security_values) return;

    $sql = "INSERT INTO security_values (   
    flatNumber,
    streetNumber,
    buildingName,
    street,
    cityTown,
    districtRegion,
    postcode,
    titleNumber,
    leaseholdYearsLeft,
    propertyType,
    descriptionD,
    purchasePrice,
    marketValue,
    dayValue180,
    90dayValue,
    grossDevelopmentValue,
    dateValued,
    valuerName,
    country,form_data_id) VALUES ";

    $values_arr = array();

    foreach ($security_values as $key => $value) {
        
        $flatNumberHorizontal2 = $value['flat-number'];
        $streetNumberHorizontal2 = $value['street-number'];
        $buildingNameHorizontal2 = $value['building-name'];
        $streetHorizontal2 = $value['street'];
        $cityTownHorizontal2 = $value['city-town'];
        $districtRegionHorizontal2 = $value['district-region'];
        $postCodeHorizontal = $value['post-code'];
        $titleNumberHorizontal = $value['title-number'];
        $leaseholdYearsHoldHorizontal = $value['leasehold-years-hold'];
        $propertyTypeHorizontal = $value['property-type'];
        $descriptionHorizontal = $value['description'];
        $purchasePriceHorizontal = $value['purchase-price'];
        $marketValueHorizontal = $value['market-value'];
        $dayValueHorizontal180 = $value['180-day-value'];
        $dayValueHorizontal90 = $value['90-day-value'];
        $grossDevelopmentValueHorizontal = $value['gross-development-value'];
        $dateValuedHorizontal = $value['date-valued'];
        $valuerNameHorizontal = $value['valuer-name'];
        $country = $value['country'];

        $values = "( 
            '$flatNumberHorizontal2',
            '$streetNumberHorizontal2',
            '$buildingNameHorizontal2',
            '$streetHorizontal2',
            '$cityTownHorizontal2',
            '$districtRegionHorizontal2',
            '$postCodeHorizontal',
            '$titleNumberHorizontal',
            '$leaseholdYearsHoldHorizontal',
            '$propertyTypeHorizontal',
            '$descriptionHorizontal',
            '$purchasePriceHorizontal',
            '$marketValueHorizontal',
            '$dayValueHorizontal180',
            '$dayValueHorizontal90',
            '$grossDevelopmentValueHorizontal',
            '$dateValuedHorizontal',
            '$valuerNameHorizontal',
            '$country','$form_id')";

        array_push($values_arr,$values);
    }

    $sql .= implode(",",$values_arr);
    $sql .= ";";

    $conn->query($sql);

}

function create_form_data_extensions_db($form_id){
    global $conn;

    $extensions = isset($_POST['extensions'])?$_POST['extensions']:null;
    if(!$extensions) return;


    $sql = "INSERT INTO extensions (   
    extension,
    extFee,
    comments,
    form_data_id
    ) VALUES ";

    $values_arr = array();

    foreach ($extensions as $key => $value) {
        
        $extension = $value['extension'];
        $fee = $value['fee'];
        $comments = $value['comments'];
  
        $values = "( 
            '$extension',
            '$fee',
            '$comments',
            '$form_id'
            )";

        array_push($values_arr,$values);
    }

    $sql .= implode(",",$values_arr);
    $sql .= ";";

    $conn->query($sql);

}

function create_form_data_loan_type_db($form_id){
    global $conn;
    
    $loan = isset($_POST['loan'])?$_POST['loan']:null;
    if(!$loan) return;


    $sql = "INSERT INTO loan_type (   
    comments,
    amount,
    dateD,
    type,
    form_data_id
    ) VALUES ";

    $values_arr = array();

    foreach ($loan as $key => $value) {
        
        $comments= $value['comments'];
        $amount = $value['amount'];
        $date = $value['date'];
        $type = $value['type'];
  
        $values = "( 
            '$comments',
            '$amount',
            '$date',
            '$type',
            '$form_id'
            )";

        array_push($values_arr,$values);
    }

    $sql .= implode(",",$values_arr);
    $sql .= ";";

        $conn->query($sql);
  
}

function create_form_data_investors_db($form_id){
    global $conn;

    $investors = isset($_POST['investors'])?$_POST['investors']:null;
    if(!$investors) return;


    $sql = "INSERT INTO investors (   
    investor,
    investedAmount,
    date,
    rateOfReturn,
    comments,
    form_data_id
    ) VALUES ";

    $values_arr = array();

    foreach ($investors as $key => $value) {
        
        $investor = $value['investor'];
        $investedAmount = $value['investedAmount'];
        $date = $value['date'];
        $rateOfReturn = $value['rateOfReturn'];
        $comments = $value['comments'];
  
        $values = "( 
            '$investor',
            '$investedAmount',
            '$date',
            '$rateOfReturn',
            '$comments',
            '$form_id'
            )";

        array_push($values_arr,$values);
    }

    $sql .= implode(",",$values_arr);
    $sql .= ";";

    $conn->query($sql);
  

}

function create_form_data_db($user_id){
    $form_id = create_client_and_loan_details_db($user_id);
    create_form_data_security_value_db($form_id);
    create_form_data_extensions_db($form_id);
    create_form_data_loan_type_db($form_id);
    create_form_data_investors_db($form_id);
}

function submit_forum(){
    try {
        create_form_data_db($_SESSION['user']['id']);
        $_SESSION['success'] = "Congratulations! You successfully Submitted The Forum";
        header("Location:forum.php");
    } catch (\Throwable $th) {
        $_SESSION['error'] = "There is some error occured while submitting the form.Please Try Again.";
    }
}

function edit_form ($deal_id, $user_id) {
    try {
        // delete_previous_record($deal_id);
        create_form_data_db($user_id);
        $_SESSION['success'] = "Congratulations! You Form Data Have Been Updated";
        header("Location:forum.php");
    } catch (\Throwable $th) {
        $_SESSION['error'] = "There is some error occured while submitting the form.Please Try Again.";
    }
}