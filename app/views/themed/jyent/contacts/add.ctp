<style type="text/css">
ul, ol{
margin:0 1em 1em 0;
padding-left:3.333em;

}

input[type="text"], input[type="password"], input.text, input.title, textarea, select {
margin:0;
}

input.text, input.title{
padding:5px;
width:200px;
}

textarea{
height:200px;
padding:5px;
width:450px;
}
label.mod {
	float:none;
	font-size:110%;
	margin:0.8em 0;
	width:170px;
}
span.piclabel {
	font-weight:bold;
	vertical-align:top;
	margin-left:10px;
}
</style>
<div class="span-12">
    <img src="/img/map.png" width="462" height="370" />
</div>
<div class="span-12 last">
    <label class="mod" style="width:100%">Address:</label>
      <p>Block 1013 Geylang East Ave 3 #07-136 Singapore 389728</p>
      <p><label class="mod">Tel:</label>  6749 1893 / 1894 / 1895</p>
      <p><label class="mod">Fax:</label> 6744 4318</p>
      <p><label class="mod">Working hours:</label> 8.30am to 6pm(Lunch time 12 to 1pm)</p>
      <p><label class="mod">Email:</label> jyent[at]singnet.com.sg</p>
      <p>You can also contact us by filling the form below:</p>
	<div class="span-4">
	    <div><?php echo $html->image('icon_train.png'); ?><span class="piclabel">By Train</span></div>
	    Exit C and walk towards Block 1016
	</div>
	<div class="span-4">
	    <div><?php echo $html->image('icon_bus.png'); ?><span class="piclabel">By Bus Stop 1</span></div>
	    Bus Stop No. 81229<br/>
	    Bus Service: 80, 155
	</div>
	<div class="span-4 last">
	    <div><?php echo $html->image('icon_bus.png'); ?><span class="piclabel">By Bus Stop 2</span></div>
	    Bus Stop No. 81119<br/>
	    Bus Service: 24, 28, 43, 70, 76, 135, 154, 155, 70M
	</div>
</div>
<?php echo $form->create('Contact'); ?>
<fieldset>
	<legend><?php __('Contact Us'); ?>
<ul>
	<li><?php echo $form->input('name'); ?></li>
	<li><?php echo $form->input('company'); ?></li>
	<li><?php echo $form->input('designation'); ?></li>
	<li><?php echo $form->input('email'); ?></li>
	<li><?php echo $form->input('contact_number'); ?></li>
	<li><?php echo $form->input('message', array('type' => 'textarea') ); ?></li>
	<li><?php echo $form->submit('Send'); ?></li>
</ul>
</fieldset>
<?php echo $form->end(); ?>
