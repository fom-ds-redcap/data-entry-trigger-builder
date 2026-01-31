<?php

/**
 * Before sainv the DET settings, validate, and return any errors.
 */

$data_entry_trigger_builder = new BCCHR\DataEntryTriggerBuilder\DataEntryTriggerBuilder();

$settings = $_POST["triggers"];

$errors = $data_entry_trigger_builder->get_det_errors($settings);

if (!empty($errors))
{
    print json_encode($errors);
}
else
{
    $data_entry_trigger_builder->setProjectSetting("det_settings", json_encode($settings));
    $data_entry_trigger_builder->setProjectSetting("saved_timestamp", date("Y-m-d H:i:s"));
    $data_entry_trigger_builder->setProjectSetting("saved_by", USERID);
    print json_encode(array("success" => true));
}