<?php
class Logger extends CFileLogRoute
{
    protected function formatLogMessage($message, $level='info', $category='', $time)
    {
    	$session_id = session_id();
        $micro      = sprintf("%06d",($time - floor($time)) * 1000000);
        return "[".$session_id."][".date('Y-m-d H:i:s.'.$micro,$time)."] [$level] [$category] $message\n";
    }
}
?>
