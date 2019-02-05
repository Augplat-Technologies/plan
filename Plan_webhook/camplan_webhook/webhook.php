<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // fetch RAW input
    $json = file_get_contents('php://input');
    
    //Database Connection
    require_once 'data.php';


    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    } 

    
$json = json_decode($json, true);
$sub_id= $json['submission']['_id'];
$query="SELECT * FROM campdata WHERE id = '$sub_id'";

if($result=mysqli_query($conn,$query)){

if(mysqli_num_rows($result)>0){
}
else{
    //Details
    $sub_id= $json['submission']['_id'];
    $firstname=$json['submission']['data']['page2FullName'];
    $email=$json['submission']['data']['page2PanelEmail'];
    $emailupdate=json_encode($json['submission']['data']['page2Checkbox']['1']);
    //Campaign Area
    $campaignarea=$json['submission']['data']['page3ChooseCampaignArea'];

    $a=$json['submission']['data']['page3ChooseCampaignArea2SelectYourCampaignTypeTopoftheFunnel'];
    if($a!=""){
        $campaigntype=$a;

                if($campaigntype == "Brand Awareness Campaign")
        {
        $a=json_encode($json['submission']['data']['page3FieldsetSelectBoxes']['Brand1']);
        $b=json_encode($json['submission']['data']['page3FieldsetSelectBoxes']['Brand2']);
        $c=json_encode($json['submission']['data']['page3FieldsetSelectBoxes']['Brand3']);
        $d=json_encode($json['submission']['data']['page3FieldsetSelectBoxes']['Brand4']);
        $object=array($a,$b,$c,$d);
        $campaign_object=implode(",", $object);   
        }
                if($campaigntype == "Promote Event / Webinar")
        {
        $a=json_encode($json['submission']['data']['page3FieldsetSelectBoxes2']['Event1']);
        $b=json_encode($json['submission']['data']['page3FieldsetSelectBoxes2']['Event2']);
        $object=array($a,$b);
        $campaign_object=implode(",", $object);   
        }
                if($campaigntype == "Social Media Campaign")
        {
        $a=json_encode($json['submission']['data']['page3FieldsetSelectBoxes3']['SocialMedia1']);
        $b=json_encode($json['submission']['data']['page3FieldsetSelectBoxes3']['SocialMedia2']);
        $c=json_encode($json['submission']['data']['page3FieldsetSelectBoxes3']['SocialMedia3']);
        $d=json_encode($json['submission']['data']['page3FieldsetSelectBoxes3']['SocialMedia4']);
        $object=array($a,$b,$c,$d);
        $campaign_object=implode(",", $object);   
        }
                if($campaigntype == "Contests / Sweepstakes")
        {
        $a=json_encode($json['submission']['data']['page3FieldsetSelectBoxes4']['Contests1']);
        $b=json_encode($json['submission']['data']['page3FieldsetSelectBoxes4']['Contests2']);
        $c=json_encode($json['submission']['data']['page3FieldsetSelectBoxes4']['Contests3']);
        $d=json_encode($json['submission']['data']['page3FieldsetSelectBoxes4']['Contests4']);
        $e=json_encode($json['submission']['data']['page3FieldsetSelectBoxes4']['Contests5']);
        $object=array($a,$b,$c,$d,$e);
        $campaign_object=implode(",", $object);
        }
                if($campaigntype == "Product Launch Campaign")
        {
        $a=json_encode($json['submission']['data']['page3FieldsetSelectBoxes5']['Product1']);
        $b=json_encode($json['submission']['data']['page3FieldsetSelectBoxes5']['Product2']);
        $c=json_encode($json['submission']['data']['page3FieldsetSelectBoxes5']['Product3']);
        $object=array($a,$b,$c);
        $campaign_object=implode(",", $object);   
        }
                if($campaigntype == "Readiness Campaign")
        {
        $a=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness']['Readiness1']);
        $b=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness']['Readiness2']);
        $c=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness']['Readiness3']);
        $d=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness']['Readiness4']);
        $e=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness']['Readiness5']);
        $object=array($a,$b,$c,$d,$e);
        $campaign_object=implode(",", $object);
        }
    }
    $a=$json['submission']['data']['page3ChooseCampaignArea2SelectYourCampaignTypeTopoftheFunnel2'];
    if($a!=""){
        $campaigntype=$a;
        if($campaigntype == "Personalised Campaign")
        {
        $a=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness2']['Personalised1']);
        $b=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness2']['Personalised2']);
        $c=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness2']['Personalised3']);
        $d=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness2']['Personalised4']);
        $e=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness2']['Personalised5']);
        $object=array($a,$b,$c,$d,$e);
        $campaign_object=implode(",", $object);
        }
        if($campaigntype == "Retargeting Campaign")
        {
        $a=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness3']['Retargeting1']);
        $b=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness3']['Retargeting2']);
        $c=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness3']['Retargeting3']);
        $d=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness3']['Retargeting4']);
        $object=array($a,$b,$c,$d);
        $campaign_object=implode(",", $object);
        }
        if($campaigntype == "Winback Campaign")
        {
        $a=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness4']['Win1']);
        $b=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness4']['Win2']);
        $c=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness4']['Win3']);
        $d=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness4']['Win4']);
        $e=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness4']['Win5']);
        $object=array($a,$b,$c,$d,$e);
        $campaign_object=implode(",", $object);
        }
        if($campaigntype == "Lead Nurturing Campaign")
        {
        $a=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness5']['Lead1']);
        $b=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness5']['Lead2']);
        $c=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness5']['Lead3']);
        $d=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness5']['Lead4']);
        $e=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness5']['Lead5']);
        $object=array($a,$b,$c,$d,$e);
        $campaign_object=implode(",", $object);
        }
        if($campaigntype == "Compete Campaign")
        {
        $a=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness6']['Compete1']);
        $b=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness6']['Compete2']);
        $c=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness6']['Compete3']);
        $d=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness6']['Compete4']);
        $e=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness6']['Compete5']);
        $object=array($a,$b,$c,$d,$e);
        $campaign_object=implode(",", $object);
        }
    }
    $a=$json['submission']['data']['page3ChooseCampaignArea2SelectYourCampaignTypeTopoftheFunnel3'];
    if($a!=""){
        $campaigntype=$a;
        if($campaigntype == "Demo Campaign")
        {
        $a=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness7']['Demo1']);
        $b=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness7']['Demo2']);
        $c=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness7']['Demo3']);
        $d=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness7']['Demo4']);
        $e=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness7']['Demo5']);
        $object=array($a,$b,$c,$d,$e);
        $campaign_object=implode(",", $object);
        }
        if($campaigntype == "Case Study Campaign")
        {
        $a=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness8']['Case1']);
        $b=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness8']['Case2']);
        $c=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness8']['Case3']);
        $d=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness8']['Case4']);
        $object=array($a,$b,$c,$d);
        $campaign_object=implode(",", $object);
        }
        if($campaigntype == "Demand Generation Campaign")
        {
        $a=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness9']['Demand1']);
        $b=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness9']['Demand2']);
        $c=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness9']['Demand3']);
        $d=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness9']['Demand4']);
        $e=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness9']['Demand5']);
        $object=array($a,$b,$c,$d,$e);
        $campaign_object=implode(",", $object);
        }
        if($campaigntype == "Sales Promotions")
        {
        $a=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness10']['Sales1']);
        $b=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness10']['Sales2']);
        $c=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness10']['Sales3']);
        $d=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness10']['Sales4']);
        $object=array($a,$b,$c,$d);
        $campaign_object=implode(",", $object);
        }
        if($campaigntype == "Channel Promotions")
        {
        $a=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness11']['Channel1']);
        $b=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness11']['Channel2']);
        $c=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness11']['Channel3']);
        $d=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness11']['Channel4']);
        $object=array($a,$b,$c,$d);
        $campaign_object=implode(",", $object);
        }
    }
    $a=$json['submission']['data']['page3ChooseCampaignArea2SelectYourCampaignTypeTopoftheFunnel4'];
    if($a!=""){
        $campaigntype=$a;
        if($campaigntype == "Renewal Campaign")
        {
        $a=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness12']['Renewal1']);
        $b=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness12']['Renewal2']);
        $c=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness12']['Renewal3']);
        $d=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness12']['Renewal4']);
        $e=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness12']['Renewal5']);
        $object=array($a,$b,$c,$d,$e);
        $campaign_object=implode(",", $object);
        }
        if($campaigntype == "Upgrade Campaign")
        {
        $a=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness13']['Upgrade1']);
        $b=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness13']['Upgrade2']);
        $c=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness13']['Upgrade3']);
        $d=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness13']['Upgrade4']);
        $e=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness13']['Upgrade5']);
        $object=array($a,$b,$c,$d,$e);
        $campaign_object=implode(",", $object);
        }
        if($campaigntype == "Cross-sell / Up-sell Campaign")
        {
        $a=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness14']['Cross1']);
        $b=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness14']['Cross2']);
        $c=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness14']['Cross3']);
        $d=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness14']['Cross4']);
        $e=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness14']['Cross5']);
        $object=array($a,$b,$c,$d,$e);
        $campaign_object=implode(",", $object);
        }
        if($campaigntype == "CSAT Campaign")
        {
        $a=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness15']['CSAT1']);
        $b=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness15']['CSAT2']);
        $c=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness15']['CSAT3']);
        $d=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness15']['CSAT4']);
        $e=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness15']['CSAT5']);
        $object=array($a,$b,$c,$d,$e);
        $campaign_object=implode(",", $object);
        }
        if($campaigntype == "Welcome Campaign")
        {
        $a=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness16']['Welcome1']);
        $b=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness16']['Welcome2']);
        $c=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness16']['Welcome3']);
        $d=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness16']['Welcome4']);
        $e=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness16']['Welcome5']);
        $object=array($a,$b,$c,$d,$e);
        $campaign_object=implode(",", $object);
        }
    }
    $a=$json['submission']['data']['page3ChooseCampaignArea2SelectYourCampaignTypeTopoftheFunnel5'];
    if($a!=""){
        $campaigntype=$a;
        if($campaigntype == "Recognition Campaign")
        {
        $a=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness18']['Recognition1']);
        $b=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness18']['Recognition2']);
        $c=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness18']['Recognition3']);
        $d=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness18']['Recognition4']);
        $e=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness18']['Recognition5']);
        $object=array($a,$b,$c,$d,$e);
        $campaign_object=implode(",", $object);
        }
        if($campaigntype == "Customer Council Campaign")
        {
        $a=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness19']['Customer1']);
        $b=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness19']['Customer2']);
        $c=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness19']['Customer3']);
        $d=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness19']['Customer4']);
        $e=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness19']['Customer5']);
        $object=array($a,$b,$c,$d,$e);
        $campaign_object=implode(",", $object);
        }
        if($campaigntype == "Thought Leadership Campaign")
        {
        $a=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness20']['Thought1']);
        $b=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness20']['Thought2']);
        $c=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness20']['Thought3']);
        $d=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness20']['Thought4']);
        $e=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness20']['Thought5']);
        $object=array($a,$b,$c,$d,$e);
        $campaign_object=implode(",", $object);
        }
        if($campaigntype == "Referral Campaign")
        {
        $a=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness21']['Referral1']);
        $b=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness21']['Referral2']);
        $c=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness21']['Referral3']);
        $d=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness21']['Referral4']);
        $e=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness21']['Referral5']);
        $object=array($a,$b,$c,$d,$e);
        $campaign_object=implode(",", $object);
        }
    }
    $a=$json['submission']['data']['page3ChooseCampaignArea2SelectYourCampaignTypeTopoftheFunnel6'];
    if($a!=""){
        $campaigntype=$a;
        if($campaigntype == "Partner Campaign")
        {
        $a=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness22']['Partner1']);
        $b=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness22']['Partner2']);
        $c=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness22']['Partner3']);
        $d=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness22']['Partner4']);
        $e=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness22']['Partner5']);
        $object=array($a,$b,$c,$d,$e);
        $campaign_object=implode(",", $object);
        }
        if($campaigntype == "Send Newsletter")
        {
        $a=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness23']['Newsletter1']);
        $b=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness23']['Newsletter2']);
        $c=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness23']['Newsletter3']);
        $d=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness23']['Newsletter4']);
        $e=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness23']['Newsletter5']);
        $object=array($a,$b,$c,$d,$e);
        $campaign_object=implode(",", $object);
        }
        if($campaigntype == "Research Campaign")
        {
        $a=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness24']['Research1']);
        $b=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness24']['Research2']);
        $c=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness24']['Research3']);
        $d=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness24']['Research4']);
        $e=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness24']['Research5']);
        $object=array($a,$b,$c,$d,$e);
        $campaign_object=implode(",", $object);
        }
        if($campaigntype == "ABM Campaign")
        {
        $a=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness25']['ABM1']);
        $b=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness25']['ABM2']);
        $c=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness25']['ABM3']);
        $d=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness25']['ABM4']);
        $e=json_encode($json['submission']['data']['page3Well6CampaignObjectivesReadiness25']['ABM5']);
        $object=array($a,$b,$c,$d,$e);
        $campaign_object=implode(",", $object);
        }
    }
    
    $event_date=$json['submission']['data']['page3Well2ColumnsFormatedEventDate'];
    $product_date=$json['submission']['data']['page3Well5ColumnsFormatedProductDate'];
    
    $obj=$json['submission']['data']['page3WellAnyotherobjective'];
    if("$obj"!="")
    {
        $objective=$json['submission']['data']['page3WellAnyotherobjective'];
    }
    $obj=$json['submission']['data']['page3WellAnyotherobjective2'];
    if("$obj"!="")
    {
        $objective=$json['submission']['data']['page3WellAnyotherobjective2'];
    }
    $obj=$json['submission']['data']['page3WellAnyotherobjective3'];
    if("$obj"!="")
    {
        $objective=$json['submission']['data']['page3WellAnyotherobjective3'];
    }
    $obj=$json['submission']['data']['page3WellAnyotherobjective4'];
    if("$obj"!="")
    {
        $objective=$json['submission']['data']['page3WellAnyotherobjective4'];
    }
    $obj=$json['submission']['data']['page3WellAnyotherobjective5'];
    if("$obj"!="")
    {
        $objective=$json['submission']['data']['page3WellAnyotherobjective5'];
    }
    $obj=$json['submission']['data']['page3WellAnyotherobjective6'];
    if("$obj"!="")
    {
        $objective=$json['submission']['data']['page3WellAnyotherobjective6'];
    }
    $obj=$json['submission']['data']['page3WellAnyotherobjective7'];
    if("$obj"!="")
    {
        $objective=$json['submission']['data']['page3WellAnyotherobjective7'];
    }
    $obj=$json['submission']['data']['page3WellAnyotherobjective8'];
    if("$obj"!="")
    {
        $objective=$json['submission']['data']['page3WellAnyotherobjective8'];
    }
    $obj=$json['submission']['data']['page3WellAnyotherobjective9'];
    if("$obj"!="")
    {
        $objective=$json['submission']['data']['page3WellAnyotherobjective9'];
    }
    $obj=$json['submission']['data']['page3WellAnyotherobjective10'];
    if("$obj"!="")
    {
        $objective=$json['submission']['data']['page3WellAnyotherobjective10'];
    }
    $obj=$json['submission']['data']['page3WellAnyotherobjective11'];
    if("$obj"!="")
    {
        $objective=$json['submission']['data']['page3WellAnyotherobjective11'];
    }
    $obj=$json['submission']['data']['page3WellAnyotherobjective12'];
    if("$obj"!="")
    {
        $objective=$json['submission']['data']['page3WellAnyotherobjective12'];
    }
    $obj=$json['submission']['data']['page3WellAnyotherobjective13'];
    if("$obj"!="")
    {
        $objective=$json['submission']['data']['page3WellAnyotherobjective13'];
    }
    $obj=$json['submission']['data']['page3WellAnyotherobjective14'];
    if("$obj"!="")
    {
        $objective=$json['submission']['data']['page3WellAnyotherobjective14'];
    }
    $obj=$json['submission']['data']['page3WellAnyotherobjective15'];
    if("$obj"!="")
    {
        $objective=$json['submission']['data']['page3WellAnyotherobjective15'];
    }
    $obj=$json['submission']['data']['page3WellAnyotherobjective16'];
    if("$obj"!="")
    {
        $objective=$json['submission']['data']['page3WellAnyotherobjective16'];
    }
    $obj=$json['submission']['data']['page3WellAnyotherobjective17'];
    if("$obj"!="")
    {
        $objective=$json['submission']['data']['page3WellAnyotherobjective17'];
    }
    $obj=$json['submission']['data']['page3WellAnyotherobjective18'];
    if("$obj"!="")
    {
        $objective=$json['submission']['data']['page3WellAnyotherobjective18'];
    }
    $obj=$json['submission']['data']['page3WellAnyotherobjective19'];
    if("$obj"!="")
    {
        $objective=$json['submission']['data']['page3WellAnyotherobjective19'];
    }
    $obj=$json['submission']['data']['page3WellAnyotherobjective20'];
    if("$obj"!="")
    {
        $objective=$json['submission']['data']['page3WellAnyotherobjective20'];
    }
    $obj=$json['submission']['data']['page3WellAnyotherobjective21'];
    if("$obj"!="")
    {
        $objective=$json['submission']['data']['page3WellAnyotherobjective21'];
    }
    $obj=$json['submission']['data']['page3WellAnyotherobjective22'];
    if("$obj"!="")
    {
        $objective=$json['submission']['data']['page3WellAnyotherobjective22'];
    }
    $obj=$json['submission']['data']['page3WellAnyotherobjective23'];
    if("$obj"!="")
    {
        $objective=$json['submission']['data']['page3WellAnyotherobjective23'];
    }
    $obj=$json['submission']['data']['page3WellAnyotherobjective24'];
    if("$obj"!="")
    {
        $objective=$json['submission']['data']['page3WellAnyotherobjective24'];
    }
    $obj=$json['submission']['data']['page3WellAnyotherobjective25'];
    if("$obj"!="")
    {
        $objective=$json['submission']['data']['page3WellAnyotherobjective25'];
    }
    $obj=$json['submission']['data']['page3WellAnyotherobjective26'];
    if("$obj"!="")
    {
        $objective=$json['submission']['data']['page3WellAnyotherobjective26'];
    }
    $obj=$json['submission']['data']['page3WellAnyotherobjective27'];
    if("$obj"!="")
    {
        $objective=$json['submission']['data']['page3WellAnyotherobjective27'];
    }
    $obj=$json['submission']['data']['page3WellAnyotherobjective28'];
    if("$obj"!="")
    {
        $objective=$json['submission']['data']['page3WellAnyotherobjective28'];
    }
    $obj=$json['submission']['data']['page3WellAnyotherobjective29'];
    if("$obj"!="")
    {
        $objective=$json['submission']['data']['page3WellAnyotherobjective29'];
    }

    
    //Target Auidence
    $auidencelist=$json['submission']['data']['page5Doyouhaveanexistingaudiencelist3'];
    $sizeexisting=$json['submission']['data']['page5Whatisthesizeofyourexistinglist'];
    $newlist=$json['submission']['data']['page5Doyouwanttobuildanewlist'];
    $listsize=$json['submission']['data']['page5Whatisthesizeofyourexistinglist2'];
    $listvalue=$json['submission']['data']['page5Listvalue'];
    
        $a=json_encode($json['submission']['data']['page5ColumnsChoosetargetregions']['Regions1']);
        $b=json_encode($json['submission']['data']['page5ColumnsChoosetargetregions']['Regions2']);
        $c=json_encode($json['submission']['data']['page5ColumnsChoosetargetregions']['Regions3']);
        $d=json_encode($json['submission']['data']['page5ColumnsChoosetargetregions']['Regions4']);
        $e=json_encode($json['submission']['data']['page5ColumnsChoosetargetregions']['Regions5']);
        $f=json_encode($json['submission']['data']['page5ColumnsChoosetargetregions']['Regions6']);
        $parameter=array($a,$b,$c,$d,$e,$f);
        $Regions=implode(",", $parameter);   
        
        $a=json_encode($json['submission']['data']['page5ColumnsChoosetargetindustries2']['Size1']);
        $b=json_encode($json['submission']['data']['page5ColumnsChoosetargetindustries2']['Size2']);
        $c=json_encode($json['submission']['data']['page5ColumnsChoosetargetindustries2']['Size3']);
        $d=json_encode($json['submission']['data']['page5ColumnsChoosetargetindustries2']['Size4']);
        $e=json_encode($json['submission']['data']['page5ColumnsChoosetargetindustries2']['Size5']);
        $f=json_encode($json['submission']['data']['page5ColumnsChoosetargetindustries2']['Size6']);
        $parameter=array($a,$b,$c,$d,$e,$f);
        $Size =implode(",", $parameter);   
        
        $a=json_encode($json['submission']['data']['page5ColumnsChoosetargetindustries']['Industries1']);
        $b=json_encode($json['submission']['data']['page5ColumnsChoosetargetindustries']['Industries2']);
        $c=json_encode($json['submission']['data']['page5ColumnsChoosetargetindustries']['Industries3']);
        $d=json_encode($json['submission']['data']['page5ColumnsChoosetargetindustries']['Industries4']);
        $e=json_encode($json['submission']['data']['page5ColumnsChoosetargetindustries']['Industries5']);
        $f=json_encode($json['submission']['data']['page5ColumnsChoosetargetindustries']['Industries6']);
        $g=json_encode($json['submission']['data']['page5ColumnsChoosetargetindustries']['Industries7']);
        $parameter=array($a,$b,$c,$d,$e,$f,$g);
        $Industries =implode(",", $parameter); 
        
        $a=json_encode($json['submission']['data']['page5ColumnsChoosetargetindustries3']['Functions1']);
        $b=json_encode($json['submission']['data']['page5ColumnsChoosetargetindustries3']['Functions2']);
        $c=json_encode($json['submission']['data']['page5ColumnsChoosetargetindustries3']['Functions3']);
        $d=json_encode($json['submission']['data']['page5ColumnsChoosetargetindustries3']['Functions4']);
        $e=json_encode($json['submission']['data']['page5ColumnsChoosetargetindustries3']['Functions5']);
        $f=json_encode($json['submission']['data']['page5ColumnsChoosetargetindustries3']['Functions6']);
        $g=json_encode($json['submission']['data']['page5ColumnsChoosetargetindustries3']['Functions7']);
        $parameter=array($a,$b,$c,$d,$e,$f,$g);
        $Functions =implode(",", $parameter); 
        
        $a=json_encode($json['submission']['data']['page5ColumnsChoosetargetindustries4']['Designations1']);
        $b=json_encode($json['submission']['data']['page5ColumnsChoosetargetindustries4']['Designations2']);
        $c=json_encode($json['submission']['data']['page5ColumnsChoosetargetindustries4']['Designations3']);
        $d=json_encode($json['submission']['data']['page5ColumnsChoosetargetindustries4']['Designations4']);
        $e=json_encode($json['submission']['data']['page5ColumnsChoosetargetindustries4']['Designations5']);
        $parameter=array($a,$b,$c,$d,$e);
        $Designations =implode(",", $parameter); 
    
    
    //Campaign Period
    $campaignperiod=$json['submission']['data']['page6Chooseyourcampaignperiod'];
    $periodvalue=$json['submission']['data']['page6Periodvalue'];
    $periodindays=$json['submission']['data']['page6Periodindays'];
    $formateddate=$json['submission']['data']['page6FormatedDate'];
    //Free media channel
    $emailmarket=json_encode($json['submission']['data']['page7EmailMarketing']);
    $emailentered=$json['submission']['data']['page7ChannelsNumber'];
    $emailvalue=$json['submission']['data']['page7ChannelsEmailvalue'];
    $landingpage=json_encode($json['submission']['data']['page7EmailMarketing2']);
    $landingentered=$json['submission']['data']['page7ChannelsNumber2'];
    $landingvalue=$json['submission']['data']['page7Channels2LpValue'];
    $assets=json_encode($json['submission']['data']['page7EmailMarketing3']);
    $assetsentered=$json['submission']['data']['page7ChannelsNumber3'];
    $assetsvalue=$json['submission']['data']['page7Channels3AssetValue'];
    $twitter=json_encode($json['submission']['data']['page7FieldsetColumnsTwitterPosts']);
    $twitterentered=$json['submission']['data']['page7FieldsetColumnsAvgtweetspermonth'];
    $twittervalue=$json['submission']['data']['page7FieldsetColumnsTweetvalue'];
    $linkedin=json_encode($json['submission']['data']['page7FieldsetColumnsTwitterPosts2']);
    $linkedinentered=$json['submission']['data']['page7FieldsetColumnsAvgtweetspermonth2'];
    $linkedinvalue=$json['submission']['data']['page7FieldsetColumns2LNvalue'];
    $facebook=json_encode($json['submission']['data']['page7FieldsetColumnsTwitterPosts3']);
    $facebookentered=$json['submission']['data']['page7FieldsetColumnsAvgtweetspermonth3'];
    $facebookvalue=$json['submission']['data']['page7FieldsetColumns3FBvalue'];
    $google=json_encode($json['submission']['data']['page7FieldsetColumnsTwitterPosts4']);
    $googleentered=$json['submission']['data']['page7FieldsetColumnsAvgtweetspermonth4'];
    $googlevalue=$json['submission']['data']['page7FieldsetColumns4Gvalue'];
    $fmcvalue=$json['submission']['data']['page7FieldsetFmCvalue'];
    //Paid Media Channel
    $mobile=json_encode($json['submission']['data']['page9MobileSms']);
    $mobileentered=$json['submission']['data']['page9ColumnsNoofSmSforcampaign'];
    $mobilevalue=$json['submission']['data']['page9ColumnsSmSvalue'];
    $web=json_encode($json['submission']['data']['page9MobileSms2']);
    $webentered=$json['submission']['data']['page9ColumnsNoofSmSforcampaign2'];
    $webvalue=$json['submission']['data']['page9Columns2Bannervalue'];
    
        $a=json_encode($json['submission']['data']['page9PanelChoosedigitalchannelsforadvertisements']['Choice1']);
        $b=json_encode($json['submission']['data']['page9PanelChoosedigitalchannelsforadvertisements']['Choice2']);
        $c=json_encode($json['submission']['data']['page9PanelChoosedigitalchannelsforadvertisements']['Choice3']);
        $d=json_encode($json['submission']['data']['page9PanelChoosedigitalchannelsforadvertisements']['Choice4']);
        $e=json_encode($json['submission']['data']['page9PanelChoosedigitalchannelsforadvertisements']['Choice5']);
        $object=array($a,$b,$c,$d,$e);
        $digital_channel=implode(",", $object); 
    //Finish
    $monthlybudget=$json['submission']['data']['page9PanelWhatwillbeyourmonthlybudgetforonlineads'];
    $campaignbudget=$json['submission']['data']['page9FieldsetCampaignBudget'];
    $created=$json['submission']['data']['page10FormatedCreated'];
    
    $sql = "INSERT INTO campdata (id, firstname, email, email_update, campaign_area, campaign_type,campaign_object, event_date, product_date, objective,  auidence_list, size_existing, newlist, list_size, list_value, Regions, Size, Industries, Functions, Designations, campaign_period, periodvalue, period_indays, formated_date, email_market, email_entered, email_value, landing_page, landing_entered, landing_value, assets, assets_entered, assets_value, twitter, twitter_entered, twitter_value, linkedin, linkedin_entered, linkedin_value, facebook, facebook_entered, facebook_value, google, google_entered, google_value, fmc_value, mobile, mobile_entered, mobile_value, web, web_entered, web_value, digital_channel, monthly_budget, campaign_budget, created)
    VALUES('$sub_id', '$firstname', '$email', '$emailupdate', '$campaignarea', '$campaigntype', '$campaign_object', '$event_date', '$product_date', '$objective', '$auidencelist', '$sizeexisting', '$newlist', '$listsize', '$listvalue', '$Regions', '$Size','$Industries','$Functions','$Designations', '$campaignperiod', '$periodvalue', '$periodindays', '$formateddate', '$emailmarket', '$emailentered', '$emailvalue', '$landingpage', '$landingentered', '$landingvalue', '$assets', '$assetsentered', '$assetsvalue', '$twitter', '$twitterentered', '$twittervalue', '$linkedin', '$linkedinentered', '$linkedinvalue', '$facebook', '$facebookentered', '$facebookvalue', '$google', '$googleentered', '$googlevalue', '$fmcvalue', '$mobile', '$mobileentered', '$mobilevalue', '$web', '$webentered', '$webvalue','$digital_channel', '$monthlybudget','$campaignbudget', '$created')";
if(!mysqli_query($conn, $sql))
{
  
}
}
}
    $conn->close();

}
?>


