<?php

require_once 'autoload.php';
require_once 'HTMLTags.php';

use HtmlTag\HTMLAnchor;
use HtmlTag\HTMLDiv;
use HtmlTag\HTMLOrderedList;
use HtmlTag\HTMLUnorderedList;
use HtmlTag\HTMlList;
use HtmlTag\HTMLTable;
use HtmlTag\HTMLImage;
use HtmlTag\HTMLinput;
use HtmlTag\HTMLForm;
use HtmlTag\HTMLp;
use HtmlTag\HTMLH1;
use HtmlTag\HTMLH2;
use HtmlTag\HTMLH3;
use HtmlTag\HTMLH4;
use HtmlTag\HTMLH5;
use HtmlTag\HTMLH6;
use HtmlTag\HTMLbr;
use HtmlTag\HTMLLabel;
use HtmlTag\HTMLbutton;
use HtmlTag\HTMLSpan;
use HtmlTag\HTMLSection;
use HtmlTag\HTMLAbbreviation;
use HtmlTag\HTMLCite;
use HtmlTag\HTMLCode;
use HtmlTag\HTMLDefinition;
use HtmlTag\HTMLSample;
use HtmlTag\HTMLVariable;
use HtmlTag\HTMLArticle;
use HtmlTag\HTMLAside;
use HtmlTag\HTMLHeader;
use HtmlTag\HTMLFooter;
use HtmlTag\HTMLMain;
use HtmlTag\HTMLNav;
use HtmlTag\HTMLAddress;
use HtmlTag\HTMLBlockQuote;
use HtmlTag\HTMLQuote;
use HtmlTag\HTMLStrongTag;
use HtmlTag\HTMLTextArea;



$h1Intro = new HTMLH1();
$h1Intro->setTextContent("CSS Zen Garden"); 


$cssabbr = new HTMLAbbreviation();
$cssabbr->setAttribute('title', 'Cascading Style Sheets')
        ->setTextContent('CSS');
 
$h2Intro = new HTMLH2();
$abbrCss = $cssabbr->saveAttributes();
$h2css = $h2Intro->setTextContent('The Beauty of ' 
                . $abbrCss 
                . ' Design');
      

$banner = new HTMLHeader();
$banner->setElement($h1Intro)
       ->setElement($h2css);

$header = $banner->setAttribute('role', 'banner')
                 ->saveElements() ."<br>";


$psum = new HTMLp();
$psum->setTextContent('A demonstration of what can be accomplished visually through ' 
      . $abbrCss. '-based design. Select any style sheet from the list to load it into this page');

$htmlLink = new HTMLAnchor();
$htmlLink->setAttribute('href','/examples/index')
         ->setAttribute('title',"This page's source HTML code, not to be modified.")
         ->setTextContent('HTML File');

$htmlfile = $htmlLink->saveAttributes();


$cssLink = new HTMLAnchor();
$cssLink->setAttribute('href','/examples/style.css')
         ->setAttribute('title',"This page's sample CSS, the file you may modify.")
         ->setTextContent('CSS File');

$cssfile = $cssLink->saveAttributes();

$pExec = new HTMLp();
$pExec->setTextContent('Download the example ' 
      .$htmlfile
      . ' and ' 
      . $cssfile);

$summary = new HTMLDiv();
$summary->setClass('summary')
        ->setId('zen-summary')
        ->setAttribute('role', 'article')
        ->setElement($psum)
        ->setElement($pExec);


$pRoad = new HTMLp();  
$dom = new HTMLAbbreviation();

$dom->setAttribute('title', 'Document Object Model')
    ->setTextContent("DOM");
$abbrDom = $dom->saveAttributes();

$pRoad->setTextContent('Littering a dark and dreary road lay the 
      past relics of browser-specific tags, incompatible '
      . $abbrDom.'s' 
      . ' broken ' 
      . $abbrCss
      . ' support, and abandoned browsers.' );

$pWeb = new HTMLp();  
$w3c = new HTMLAbbreviation();
$wasp = new HTMLAbbreviation();

$w3c->setAttribute('title', 'World Wide Web Consortium')
    ->setTextContent("W3C");
$abbrW3c = $w3c->saveAttributes();

$wasp->setAttribute('title', 'Web Standards Project')
    ->setTextContent("WaSP");
$abbrWasp = $wasp->saveAttributes();

$pWeb->setTextContent('We must clear the mind of the past. 
      Web enlightenment has been achieved thanks to the tireless
      efforts of folk like the '
      . $abbrW3c.',' 
      . ' broken ' 
      . $abbrWasp
      . ', and the major browser creators.' );

$pInvites = new HTMLp();  
$pInvites->setTextContent('The CSS Zen Garden invites you to relax and meditate on the important lessons of the masters. 
Begin to see with clarity. Learn to use the time-honored techniques in new and invigorating fashion.
Become one with the web.');

$h3road = new HTMLH3();
$h3road->setTextContent('The Road to Enlightenment');

$preamble = new HTMLDiv();
$preamble->setClass('preamble')
         ->setId('zen-preamble')
         ->setAttribute('role', 'article')
         ->setElement($h3road)
         ->setElement($pRoad)
         ->setElement($pWeb)
         ->setElement($pInvites);

$intro = new HTMLSection();
$intro->setClass('intro')
      ->setId('zen-intro');

$secIntro = $intro->setClass('intro')
                  ->setId('zen-intro')
                  ->setElement($banner)
                  ->setElement($summary)
                  ->setElement($preamble);


$explanation = new HTMLDiv();
$h3About = new HTMLH3();
$h3About->setTextContent('So What is this about?');

$pPower = new HTMLp();  
$html = new HTMLAbbreviation();

$html->setAttribute('title', 'HyperText Markup Language')
    ->setTextContent("HTML");
$abbrHtml = $html->saveAttributes();

$pPower->setTextContent('There is a continuing need to show the power of '
            . $abbrCss
            . '.'
            .' The Zen Garden aims to excite, inspire, and encourage participation. 
            To begin, view some of the existing designs in the list. Clicking on any one will 
            load the style sheet into this very page.'
            .'The '
            . $abbrHtml
            . ' remains the same, the only thing that has changed
            is the external '
            . $abbrCss
            . ' file. '
            . ' Yes'
            . $abbrCss
            . ' allows complete and total control over the style of a
            hypertext document. The only way this can be illustrated in a way that gets people excited is by
            demonstrating what it can truly be, once the reins are placed in the hands of those able to create
            beauty from structure. Designers and coders alike have contributed to the beauty of the web; we can
            always push it further.');


$explanation->setClass('explanation')
            ->setId('zen-exaplanation')
            ->setAttribute('role', 'article')
            ->setElement($h3About)
            ->setElement($pPower);


$participation = new HTMLDiv();

$h3Part = new HTMLH3();
$h3Part->setTextContent('Participation');

$resources = new HTMLAnchor();
$resources->setAttribute('href', '/pages/resources/')
          ->setAttribute('title', 'A listing of CSS-related resources')
          ->setTextContent('Resource Guide');
$res = $resources->saveAttributes();

$pVisual = new HTMLp();
$pVisual->setTextContent('Strong visual design has always been our focus. 
            You are modifying this page, so strong '
            . $abbrCss
            . ' skills are necessary too, but the example files are
            commented well enough that even '
            . $abbrCss 
            . ' novices can use them
            as starting points. Please see the '
            . $abbrCss . ' '
            . $res
            . ' for advanced tutorials and tips on working with '
            . $abbrCss . '.');

$pModify = new HTMLp();
$pModify->setTextContent('You may modify the style sheet in any way you wish, but not the '
            . $abbrHtml
            . '. This may seem daunting at first if you&#8217;ve
            never worked this way before, but follow the listed links to learn more, 
            and use the sample files as a guide.');

$pSample = new HTMLp();

$indexLink = new HTMLAnchor();
$indexLink->setAttribute('href', '/examples/index')
          ->setAttribute('title', "This page's source HTML code, not to be modified.")
          ->setTextContent('HTML');
$index = $indexLink->saveAttributes();

$submitLink = new HTMLAnchor();
$submitLink->setAttribute('href', '/pages/submit/')
          ->setAttribute('title', "Use the contact form to send us your CSS file.")
          ->setTextContent('Send us a link');
$submit = $submitLink->saveAttributes();

$pSample->setTextContent('Download the sample '
            . $index
            . 'and '
            . $cssfile
            . ' to
            work on a copy locally. Once you have completed your masterpiece 
            (and please, don&#8217;t submit half-finished work) upload your '
            . $abbrCss
            . ' file to a web server under your control.'
            . $submit . ' '
            . ' to an archive of that file and all associated assets, and if we choose to 
            use it we will download it and place it on our server.');


$participation->setClass('participation')
              ->setId('zen-participation')
              ->setAttribute('role', 'article')
              ->setElement($h3Part)
              ->setElement($pVisual)
              ->setElement($pModify)
              ->setElement($pSample);




$h3Benefit = new HTMLH3();
$h3Benefit->setTextContent('Benefits');

$pBenefit = new HTMLp();
$pBenefit->setTextContent('Why participate? For recognition, inspiration, and a resource 
            we can all refer to showing people how amazing '
            . $abbrCss
            . ' really can be. This site serves as equal parts inspiration for those working on 
            the web today, learning tool for those who will be tomorrow, and gallery of 
            future techniques we can all look forward to.');

$benefit = new HTMLDiv();
$benefits = $benefit->setClass('benefits')
                    ->setId('zen-benefits')
                    ->setAttribute('role', 'article')
                    ->setElement($h3Benefit)
                    ->setElement($pBenefit);


$h3requirement = new HTMLH3();
$h3requirement->setTextContent('Requirements');

$pMostly = new HTMLp();

$css1_2 = new HTMLAbbreviation();
$css1_2->setAttribute('title', 'Cascading Style Sheets, levels 1 and 2')
       ->setTextContent("CSS 1 &amp; 2");
$abbrcss1_2 = $css1_2->saveAttributes();


$css3_4 = new HTMLAbbreviation();
$css3_4->setAttribute('title', 'Cascading Style Sheets, levels 3 and 4')
       ->setTextContent("CSS 3 &amp; 4");
$abbrcss3_4 = $css3_4->saveAttributes();

$pMostly->setTextContent('Where possible, we would like to see mostly '
            . $abbrcss1_2
            . ' usage. '
            . $abbrcss3_4
            . ' should be limited to widely-supported elements only, or strong fallbacks should be
            provided. The CSS Zen Garden is about functional, practical '
            . $abbrCss
            . ' and not the latest bleeding-edge tricks viewable by 2% of the browsing public. 
            The only real requirement we have is that your '
            . $abbrCss
            . ' validates.');

$pLucky = new HTMLp();
$pLucky->setTextContent('Luckily, designing this way shows how well various browsers 
            have implemented '
            . $abbrCss
            . ' by now. When sticking to the guidelines you should see fairly consistent results 
            across most modern browsers. Due to the sheer number of user agents on the web these days 
            &#8212; especially when you factor in mobile &#8212; pixel-perfect layouts may not be
            possible across every platform. That&#8217;s okay, but do test in as many as you can. Your design
            should work in at least IE9+ and the latest Chrome, Firefox, iOS and Android browsers (run by over
            90% of the population).');

$pArtwork = new HTMLp();
$pArtwork->setTextContent('We ask that you submit original artwork. Please respect copyright laws. 
            Please keep objectionable material to a minimum, and try to incorporate unique and interesting 
            visual themes to your work. We&#8217;re well past the point of needing another garden-related design.');

$pLearning = new HTMLp();

$subLink = new HTMLAnchor();
$subLink->setAttribute('href', '/pages/submit/guidelines/')
        ->setTextContent('submission guidelines');
$submission = $subLink->saveAttributes();



$licenseLink = new HTMLAnchor();
$licenseLink->setAttribute('href', 'http://creativecommons.org/licenses/by-nc-sa/3.0/')
            ->setTextContent('one on this site')
            ->setAttribute('title', "View the Zen Garden's license information.");
$license = $licenseLink->saveAttributes();


$pLearning->setTextContent('This is a learning exercise as well as a demonstration. You retain full copyright 
            on your graphics (with limited exceptions, see '
            . $submission
            . '), but we ask you release your '
            . $abbrCss
            . ' under a Creative Commons license identical to the '
            . $license
            . ' so that others may learn from your work.');

$pContent = new HTMLp();

$daveShea= new HTMLAnchor();
$daveShea->setAttribute('href', 'http://www.mezzoblue.com/')
         ->setTextContent('Dave Shea');
$dave = $daveShea->saveAttributes();


$mediaTemple= new HTMLAnchor();
$mediaTemple->setAttribute('href', 'http://www.mediatemple.net/')
            ->setTextContent('. Now available: ');
$media = $mediaTemple->saveAttributes();

$theBook= new HTMLAnchor();
$theBook->setAttribute('href', 'http://www.amazon.com/exec/obidos/ASIN/0321303474/mezzoblue-20/')
            ->setTextContent('Zen Garden, the book');
$book = $theBook->saveAttributes();

$pContent->setAttribute('role', 'contentinfor')
         ->setTextContent('By '
            . $dave
            . '. Bandwidth graciously donated by'
            . $media
            . $book);

$req = new HTMLDiv();
$requirements = $req->setClass('requirement')
                    ->setId('zen-requirements')
                    ->setAttribute('role', 'article')
                    ->setElement($h3requirement)
                    ->setElement($pMostly)
                    ->setElement($pLucky)
                    ->setElement($pArtwork)
                    ->setElement($pLearning)
                    ->setElement($pContent);

$footer = new HTMLFooter();

$htmlFooterLink = new HTMLAnchor();
$htmlFooterLink->setHref('http://validator.w3.org/check/referer')
               ->setAttribute('title', 'Check the validity of this site&#8217;s HTML')
               ->setClass('zen-validate-html')
               ->setTextContent('HTML')
               ->saveAttributes();

$cssFooterLink = new HTMLAnchor();
$cssFooterLink->setHref('http://jigsaw.w3.org/css-validator/check/referer')
               ->setAttribute('title', 'Check the validity of this site&#8217;s CSS')
               ->setClass('zen-validate-css')
               ->setTextContent('CSS')
               ->saveAttributes();

$ccFooterLink = new HTMLAnchor();
$ccFooterLink->setHref('http://creativecommons.org/licenses/by-nc-sa/3.0/')
               ->setAttribute('title', 'View the Creative Commons license of this site: Attribution-NonCommercial-ShareAlike.')
               ->setClass('zen-license')
               ->setTextContent('CC')
               ->saveAttributes();
      
$allyFooterLink = new HTMLAnchor();
$allyFooterLink->setHref('http://jigsaw.w3.org/css-validator/check/referer')
               ->setAttribute('title', 'Check the validity of this site&#8217;s CSS')
               ->setClass('zen-accessibility')
               ->setTextContent('A11y')
               ->saveAttributes();

$ghFooterLink = new HTMLAnchor();
$ghFooterLink->setHref('https://github.com/mezzoblue/csszengarden.com')
               ->setAttribute('title', 'Fork this site on Github')
               ->setClass('zen-github')
               ->setTextContent('GH')
               ->saveAttributes();

$footer->setElement($htmlFooterLink)
       ->setElement($cssFooterLink)
       ->setElement($ccFooterLink)
       ->setElement($allyFooterLink)
       ->setElement($ghFooterLink);


$mainSupport = new HTMLDiv();
$mainsupport = $mainSupport->setClass('main supporting')
                           ->setId('zen-supporting')
                           ->setAttribute('role', 'main')
                           ->setElement($explanation)
                           ->setElement($participation)
                           ->setElement($benefits)
                           ->setElement($requirements)
                           ->setElement($footer);

$h3Select = new HTMLH3();
$h3Select->setTextContent('Select a Design:');

$nav = new HTMLNav();
$list = new HTMLUnorderedList();

$item1 = '<a href="/221/" class="design-name">Mid Century Modern</a> by <a
href="http://andrewlohman.com/" class="designer-name">Andrew Lohman</a>';

$item2 = '<a href="/220/" class="design-name">Garments</a> by <a href="http://danielmall.com/"
class="designer-name">Dan Mall</a>';

$item3 = '<a href="/219/" class="design-name">Steel</a> by <a href="http://steffen-knoeller.de"
class="designer-name">Steffen Knoeller</a>';

$item4 = '<a href="/218/" class="design-name">Apothecary</a> by <a href="http://trentwalton.com"
class="designer-name">Trent Walton</a>';

$item5 = '<a href="/217/" class="design-name">Screen Filler</a> by <a
href="http://elliotjaystocks.com/" class="designer-name">Elliot Jay Stocks</a>';

$item6 = '<a href="/216/" class="design-name">Fountain Kiss</a> by <a
href="http://jeremycarlson.com" class="designer-name">Jeremy Carlson</a>';

$item7 = '<a href="/215/" class="design-name">A Robot Named Jimmy</a> by <a
      href="http://meltmedia.com/" class="designer-name">meltmedia</a>';

$item8 = '<a href="/214/" class="design-name">Verde Moderna</a> by <a
href="http://www.mezzoblue.com/" class="designer-name">Dave Shea</a>';


$list->addItem($item1)
     ->addItem($item2)
     ->addItem($item3)
     ->addItem($item4)
     ->addItem($item5)
     ->addItem($item6)
     ->addItem($item7)
     ->addItem($item8);

$nav->setAttribute('role', 'navigation')
    ->setElement($list);

$divDesign = new HTMLDiv();
$divDesign->setClass('design-selection')
           ->setId('design-selection')
           ->setElement($h3Select)
           ->setElement($nav);


           
$divWrapper = new HTMLDiv();
$divWrapper->setClass('wrapper')
           ->setElement($divDesign);

           
$h3Archive = new HTMLH3();
$h3Archive->setClass('archives')
          ->setTextContent('Archives:');

$listArch = new HTMLUnorderedList();
$listArch->addItem('<a href="/214/page1">Next Designs <span class="indicator">
          &rsaquo;</span></a>',  ['class' => 'next'])
          ->addItem('<a href="/pages/alldesigns/" title="View every submission to the Zen Garden.">
          View All Designs </a>', ['class' => 'viewall']);      

$navArch = new HTMLNav();
$navArch->setAttribute('role', 'navigation')
    ->setElement($listArch);


$divArchive = new HTMLDiv();
$divArchive->setClass('design-archives')
           ->setId('design-archives')
           ->setElement($h3Archive)
           ->setElement($navArch);


$h3Res = new HTMLH3();
$h3Res->setClass('resources')
      ->setTextContent('Resources: ');

$resList = new HTMLUnorderedList();
$resList->addItem('<a href="style.css" title="View the source CSS file of the currently-viewed design.">
            View This Design&#8217;s <abbr title="Cascading Style Sheets">CSS</abbr> </a>',
        ['class' => 'view-css'])
        ->addItem('<a href="/pages/resources/" title="Links to great sites with information on using CSS.">
        <abbr title="Cascading Style Sheets">CSS</abbr> Resources </a>',
        ['class' => 'css-resourcess'])
        ->addItem('<a href="/pages/faq/" title="A list of Frequently Asked Questions about the Zen Garden.">
        <abbr title="Frequently Asked Questions">FAQ</abbr> </a>',
        ['class' => 'zen-faq'])
        ->addItem('<a href="/pages/submit/" title="Send in your own CSS file.">
        Submit a Design </a>',
        ['class' => 'zen-submit'])
        ->addItem('<a href="/pages/translations/" title="View translated versions of this page.">
        Translations </a>',
        ['class', 'zen-translation']);
 


$divRes = new HTMLDiv();
$divRes->setClass('zen-resources')
       ->setId('zen-resources')
       ->setElement($h3Res)
       ->setElement($resList);


$aside = new HTMLAside();
$aside->setClass('sidebar')
      ->setAttribute('role', 'complementart')
      ->setElement($divWrapper)
      ->setElement($divArchive)
      ->setElement($divRes);

$pagewrapper = new HTMLDiv();               
$divHead = $pagewrapper->setElement($header)
                       ->setElement($secIntro)
                       ->setElement($mainsupport)
                       ->setElement($aside)
                       ->setClass('page-wrapper')
                       ->saveElements();

$divExtra1 = new HTMLDiv();
$divExtra2 = new HTMLDiv();
$divExtra3 = new HTMLDiv();
$divExtra4 = new HTMLDiv();
$divExtra5 = new HTMLDiv();
$divExtra6 = new HTMLDiv();

$divEx1 = $divExtra1->setClass('extra1')
                    ->setAttribute('role', 'presentation')
                    ->saveAttributes();

$divEx2 = $divExtra2->setClass('extra1')
                    ->setAttribute('role', 'presentation')
                    ->saveAttributes();

$divEx3 = $divExtra3->setClass('extra1')
                    ->setAttribute('role', 'presentation')
                    ->saveAttributes();

$divEx4 = $divExtra4->setClass('extra1')
                    ->setAttribute('role', 'presentation')
                    ->saveAttributes();

$divEx5 = $divExtra5->setClass('extra1')
                    ->setAttribute('role', 'presentation')
                    ->saveAttributes();

$divEx6 = $divExtra6->setClass('extra1')
                    ->setAttribute('role', 'presentation')
                    ->saveAttributes();


$htmlFileName = 'zengarden.html';
$file = fopen($htmlFileName, 'w');

if ($file) {

    fwrite($file, "<!DOCTYPE html>\n");
    fwrite($file, "<html lang='en'>\n");
    fwrite($file, "<head>\n");
    fwrite($file, "<meta charset='UTF-8'>\n");
    fwrite($file, "<meta name='viewport' content='width=device-width, initial-scale=1.0'>\n");
    fwrite($file, "<link rel='stylesheet' href='styles.css'>\n");
    fwrite($file, "<title>CSS Zen Garden: The Beauty of CSS Design</title>\n");
    fwrite($file, "</head>\n");
    fwrite($file, "<body id='css-zen-garden'>\n");
    fwrite($file, $divHead);
    fwrite($file, $divEx1);
    fwrite($file, $divEx2);
    fwrite($file, $divEx3);
    fwrite($file, $divEx4);
    fwrite($file, $divEx5);
    fwrite($file, $divEx6);
    fwrite($file, "</body>\n");
    fwrite($file, "</html>");

    echo "HTML file '$htmlFileName' generated successfully.";
} else {
    echo "Error creating HTML file.";
}
