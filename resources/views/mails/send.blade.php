Hello <i>{{ $send->receiver }}</i>,
<p>This is a demo email for testing purposes! Also, it's the HTML version.</p>
 
<p><u>Demo object values:</u></p>
 
<div>
<p><b>Demo One:</b>&nbsp;{{ $send->demo_one }}</p>
<p><b>Demo Two:</b>&nbsp;{{ $send->demo_two }}</p>
</div>
 
<p><u>Values passed by With method:</u></p>
 
<div>
<p><b>testVarOne:</b>&nbsp;{{ $testVarOne }}</p>
<p><b>testVarTwo:</b>&nbsp;{{ $testVarTwo }}</p>
</div>
 
Thank You,
<br/>
<i>{{ $send->sender }}</i>