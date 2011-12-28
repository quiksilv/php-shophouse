<?php 
class AbtestHelper extends AppHelper{ 
    /** 
     * Wraps a variable piece of content with a span for 
     * the identification of clickable A/B tests on the site. 
     * 
     * Both items of content are passed in, one is chosen to display. 
     * 
     * The fourth param is important - if user leaves the page because of a click, 
     * then this must be set to true. Not all clicks leave a page, but if they 
     * do the click must be recorded before the window.location changes. 
     * 
     * @param array $abtest_data set via component 
     * @param string $testname the name of the test 
     * @param string option for content a 
     * @param string option for content b 
     * @param boolean is the user leaving the page after click, eg href 
     * 
     * @return string  the html 
     *  
     * Usage: 
     *  $abtest->rendertest( $abtest_data, 'click test' , 'Click here' , 'Don\'t click here' ); 
     * 
     */ 
    function rendertest( &$abtest_data, $testname , $contentA, $contentB, $leaving_page = true ){ 
        $abtest_id = $abtest_data[$testname]['abtest_id']; 
        $aorb = $abtest_data[$testname]['aorb']; 
        $leaving = ($leaving_page) ? 'leaving' : ''; 
        $str = '<span class="abtest '.$leaving.'" id="'.$abtest_id.'" >'; 
        $str .= ($aorb == 'a') ? $contentA : $contentB ; 
        $str .= '</span>'; 
        return $this->output($str); 
    } 
} 
?>
