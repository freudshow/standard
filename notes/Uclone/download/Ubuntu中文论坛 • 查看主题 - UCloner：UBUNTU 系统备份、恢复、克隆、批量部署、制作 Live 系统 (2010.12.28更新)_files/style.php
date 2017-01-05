/*  phpBB 3.0 Style Sheet
    --------------------------------------------------------------
	Style name:		subsilver2
	Based on style:	subSilver (the default phpBB 2 style)
	Original author:	subBlue ( http://www.subBlue.com/ )
	Modified by:		psoTFX and the phpBB team ( http://www.phpbb.com )
	
	This is an alternative style for phpBB3 for those wishing to stay with
	the familiar subSilver style of phpBB version 2.x
	
	Copyright 2006 phpBB Group ( http://www.phpbb.com/ )
    --------------------------------------------------------------
*/
/*
	XS Syntax Highlighter CSS
*/
.content .syntax {
	color: #444;
	display: block;
	margin: 5px 1px;
	width: auto;
	border: solid 1px #D0D0D0;
	background-color: #FFF;
	padding: 5px;
	font-size: 0.9em;
	font-family: Courier, 'Courier New', sans-serif;
	line-height: 1.2em;
}
.content .syntax-header {
	margin: 0;
	margin-bottom: 5px;
	padding-left: 3px;
	padding-bottom: 3px;
	border-bottom: solid 1px #E0E0E0;
	font-size: 0.9em;
	line-height: 1.2em;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: normal;
	color: #808080;
}

.syntax-header a:link,
.syntax-header a:visited
{
	color: #666;
	text-decoration: none;
	border-bottom: dotted 1px #666;
}
.syntax-header a:hover,
.syntax-header a:active
{
	color: #FF1010;
	text-decoration: none;
	border-bottom: dotted 1px #FF1010;
}

.syntax-content { padding: 0; }

.syntax-list {
	margin-top: 3px;
	margin-right: 0;
	margin-bottom: 3px;
}

li.syntax-row { 
	margin-left: 12px;
	white-space: normal; 
	border-top: 1px #E0E0E0 solid;
	color: #BBB;
	wrap-option: emergency;
}
.syntax-row-text {
	color: #444;
}

div.syntax li.syntax-row-highlight {
	color: #FF1010;
	border-color: #D8D8D8;
}

div.syntax li.syntax-row-highlight .syntax-row-text, span.syntax-row-highlight {
	color: #FF1010;
}

li.syntax-row-first {
	border-top: none;
}
/* Mini Table */
.minitable {  
	color: #444;  
	display: block;  
	margin: 5px 20px;  
	border: solid 1px #D0D0D0;  
	background-color: #FFF;  
	font-size: 12px;  
}  
.minitable-header {  
	background: #fff url(./styles/ubuntu/theme/images/bg_header.gif) top left repeat-x;
	margin: 0;  
	margin-bottom: 5px;  
	padding-left: 5px;  
	padding-top: 7px;
	padding-right: 5px;
	border-bottom: solid 1px #D0D0D0;  
	font-size: 12px;  
	line-height: 1.2em;  
	font-family: Verdana, Arial, Helvetica, sans-serif;  
	font-weight: bold;
	color: #EDEFF4;
	height: 21px;

}  
.minitable-hideme {  
	font-size: 10px;  
	line-height: 1.2em;
	font-family: Verdana, Arial, Helvetica, sans-serif;  
	font-weight: bold;
	color: #EEE;
	float: right;
}
.minitable-hideme a, .minitable-hideme a:visited {
	color: #eee;
	text-decoration: none;
}
.minitable-hideme a:hover {
	color: #fff;
	text-decoration: none;
}
.minitable-contents {  
	padding-left: 5px;  
	padding-right: 5px;  
	padding-bottom: 5px;  
	line-height: 1.5;
	text-align: left;
}  
/* Hide content */
.hide-contents,
.hide-contents .quote-message {
	color: #757575;
	background-color: #F2F2F2;
	border: 2px dotted #DEDEDE;
	text-align: left;
	padding: 5px;
}
/* Layout
 ------------ */
* {
	/* Reset browsers default margin, padding and font sizes */
	margin: 0;
	padding: 0;
}

html {
	font-size: 100%;
	background-color: #f0ebe2;
/*        background-image: url('styles/ubuntu/theme/images/htmlbg.jpg');
	background-repeat: repeat-x;
*/
}


body {
	/* Text-Sizing with ems: http://www.clagnut.com/blog/348/ */
	font-family: "Lucida Grande", Verdana, Helvetica, Arial, sans-serif;
	color: black; 
	background-color: #f0ebe2;
	font-size: 75%; /* This sets the default font size to be equivalent to 10px */
	margin: 0;
}


#wrapheader {
	min-height: 90px;
	height: auto !important;
	height: 100px;
/*	background-image: url('styles/ubuntu/theme/images/background.gif');
	background-repeat: repeat-x;*/
/*	padding: 0 25px 15px 25px;*/
	padding: 0;
}

#wrapcentre {
	margin: 0px 25px 0 25px;
}

#wrapfooter {
	text-align: center;
	clear: both;
}

#wrapnav {
	width: 100%;
	margin: 0;
	background-color: #ECECEC;
	border-width: 1px;
	border-style: solid;
	border-color: #A9B8C2;
}

#logodesc {
	margin-bottom: 0px;
	padding: 5px 25px;
	background: #f0ebe2;
	border-bottom: 0px solid #9f4c09;
}

#menubar {
	margin: 0 25px;
}

#datebar {
	margin: 0px 25px 0 25px;
}

#findbar {
	width: 100%;
	margin: 0;
	padding: 0;
	border: 0;
}

.forumrules {
	background-color: #efe1c3;
	border-width: 1px;
	border-style: solid;
	border-color: #ce8639;
	padding: 4px;
	font-weight: normal;
	font-size: 1em;
	font-family: "Lucida Grande", Verdana, Arial, Helvetica, sans-serif;
}

.forumrules h3 {
	color: red;
}

#pageheader { }
#pagecontent { }
#pagefooter { }

#poll { }
#postrow { }
#postdata { }


/*  Text
 --------------------- */
h1 {
	font-family: "Lucida Grande", "Trebuchet MS", Verdana, sans-serif;
	font-weight: bold;
	font-size: 1.8em;
	text-decoration: none;
}

h2 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 1.5em;
	text-decoration: none;
	line-height: 120%;
}

h3 {
	font-size: 1.3em;
	font-weight: bold;
	font-family: Arial, Helvetica, sans-serif;
	line-height: 120%;
}

h4 {
	margin: 0;
	font-size: 1.2em;
	font-weight: bold;
	font-family: Arial, Helvetica, sans-serif;
	text-decoration: none;
}

p {
	/* font-size: 1em; */
}

p.moderators {
	margin: 0;
	float: left;
	color: black;
	font-weight: bold;
}

.rtl p.moderators {
	float: right;
}

p.skills {
        float: left;
        margin: 0;
        color: green;
}

p.linkmcp {
	margin: 0;
	float: right;
	white-space: nowrap;
}

.rtl p.linkmcp {
	float: left;
}

p.breadcrumbs {
	margin: 0;
	float: left;
	color: black;
	font-weight: bold;
	white-space: normal;
	font-size: 1em;
}

.rtl p.breadcrumbs {
	float: right;
}

p.datetime {
	margin: 0;
	float: right;
	white-space: nowrap;
	font-size: 1em;
}

.rtl p.datetime {
	float: left;
}

p.searchbar {
	font-size: 1em;
	padding: 2px 0;
	white-space: nowrap;
} 

p.searchbarreg {
	margin: 0;
	float: right;
	white-space: nowrap;
}

.rtl p.searchbarreg {
	float: left;
}

p.forumdesc {
	color: black;
	padding-bottom: 4px;
}

p.topicauthor {
	margin: 1px 0;
}

p.topicdetails {
	margin: 1px 0;
}

.postreported, .postreported a:visited, .postreported a:hover, .postreported a:link, .postreported a:active {
	margin: 1px 0;
	color: red;
	font-weight:bold;
}

.postapprove, .postapprove a:visited, .postapprove a:hover, .postapprove a:link, .postapprove a:active {
	color: green;
	font-weight:bold;
}

.postapprove img, .postreported img {
	vertical-align: bottom;
}

.postauthor {
	font-size: 1.1em;
}

.postdetails {
	font-size: 1em;
}

.postbody {
	font-size: 1em;
	line-height: 140%; 
	font-family: "Lucida Grande", "Trebuchet MS", Helvetica, Arial, sans-serif;
}

.postbody li, ol, ul {
	margin: 0 0 0 1.2em;
}

.rtl .postbody li, .rtl ol, .rtl ul {
	margin: 0 1.2em 0 0;
}

.posthilit {
	background-color: yellow;
}

.nav {
	margin: 0;
	color: black;
	font-weight: bold;
}

.pagination {
	padding: 4px;
	color: black;
	font-size: 1em;
	font-weight: bold;
}

.cattitle {

}

.gen {
	margin: 1px 1px;
	font-size: 1em;
}

.genmed {
	margin: 1px 1px;
	font-size: 1em;
}

.gensmall {
	margin: 1px 1px;
	font-size: 1em;
}

.copyright {
	color: #444;
	font-weight: normal;
	font-family: "Lucida Grande", Verdana, Arial, Helvetica, sans-serif;
}

.titles {
	font-family: "Lucida Grande", Helvetica, Arial, sans-serif;
	font-weight: bold;
	font-size: 1em;
	text-decoration: none;
}

.error {
	color: red;
}


/* Tables
 ------------ */
th {
	color: #d4cebf;
	font-size: 1em;
	font-weight: bold;
	background-color: #3c3b37;
	/* background-image: url('styles/ubuntu/theme/images/cellpic3.gif'); */
	white-space: nowrap;
	padding: 7px 5px;
}

td {
	font-size: 1em;
	padding: 2px;
}

td.profile {
	padding: 4px;
}

td.cat {
	color: #d4cebf;
}

td.cat a:link {
	color: #d4cebf;
	text-decoration: none;
}

td.cat a:active,
td.cat a:visited {
	color: #d4cebf;
	text-decoration: none;
}

td.cat a:hover {
	color: #9f4c09;
	text-decoration: underline;
}

.tablebg {
	background-color: #efe1c3;
}

.catdiv {
	height: 28px;
	margin: 0;
	padding: 0;
	border: 0;
	background-color: #998b75;
	/*background: white url('styles/ubuntu/theme/images/cellpic2.jpg') repeat-y scroll top left;*/
}
.rtl .catdiv {
	background: white url('styles/ubuntu/theme/images/cellpic2_rtl.jpg') repeat-y scroll top right;
}

.cat {
	height: 28px;
	margin: 0;
	padding: 0;
	border: 0;
	background-color: #998b75;
	/*background-image: url('styles/ubuntu/theme/images/cellpic1.gif'); */
	text-indent: 4px;
}

.row1 {
	background-color: #f7f4ef;
	padding: 4px;
}

.row2 {
	background-color: #f7f4ef;
	padding: 4px;
}

.row3 {
	background-color: #f7f4ef;
	padding: 4px;
}

.spacer {
	background-color: #e8e2d8;
}

hr {
	height: 1px;
	border-width: 0;
	background-color: #D1D7DC;
	color: #D1D7DC;
}

.legend {
	text-align:center;
	margin: 0 auto;
}

/* Links
 ------------ */
a:link {
	color: #9f4c09;
	text-decoration: none;
}

a:active,
a:visited {
	color: #9f4c09;
	text-decoration: none;
}

a:hover {
	color: #9f4c09;
	text-decoration: underline;
}

a.forumlink {
	color: #9f4c09;
	font-weight: bold;
	font-family: "Lucida Grande", Helvetica, Arial, sans-serif;
}

a.topictitle {
	margin: 1px 0;
	font-family: "Lucida Grande", Helvetica, Arial, sans-serif;
	font-weight: bold;
	font-size: 1em;
}

a.topictitle:visited {
	color: #9f4c09;
	text-decoration: none;
}

th a,
th a:visited {
	color: #FFA34F !important;
	text-decoration: none;
}

th a:hover {
	text-decoration: underline;
}


/* Form Elements
 ------------ */
form {
	margin: 0;
	padding: 0;
	border: 0;
}

input {
	color: #333333;
	font-family: "Lucida Grande", Verdana, Helvetica, sans-serif;
	font-size: 1 em;
	font-weight: normal;
	padding: 1px;
	border: 1px solid #A9B8C2;
	background-color: #fafafa;
}

textarea {
	background-color: #FAFAFA;
	color: #333333;
	font-family: "Lucida Grande", Verdana, Helvetica, Arial, sans-serif;
	font-size: 1em; 
	line-height: 140%;
	font-weight: normal;
	border: 1px solid #A9B8C2;
	padding: 2px;
}

select {
	color: #333333;
	background-color: #FAFAFA;
	font-family: "Lucida Grande", Verdana, Helvetica, sans-serif;
	font-size: 1em;
	font-weight: normal;
	border: 1px solid #A9B8C2;
	padding: 1px;
}

option {
	padding: 0 1em 0 0;
}

option.disabled-option {
	color: graytext;
}

.rtl option {
	padding: 0 0 0 1em;
}

input.radio {
	border: none;
	background-color: transparent;
}

.post {
	background-color: white;
	border-style: solid;
	border-width: 1px;
}

.btnbbcode {
	color: #000000;
	font-weight: normal;
	font-size: 1.1em;
	font-family: "Lucida Grande", Verdana, Helvetica, sans-serif;
	background-color: #EFEFEF;
	border: 1px solid #666666;
}

.btnmain {
	font-weight: bold;
	background-color: #ECECEC;
	border: 1px solid #A9B8C2;
	cursor: pointer;
	padding: 1px 5px;
	font-size: 1.1em;
}

.btnlite {
	font-weight: normal;
	background-color: #ECECEC;
	border: 1px solid #A9B8C2;
	cursor: pointer;
	padding: 1px 5px;
	font-size: 1.1em;
}

.btnfile {
	font-weight: normal;
	background-color: #ECECEC;
	border: 1px solid #A9B8C2;
	padding: 1px 5px;
	font-size: 1.1em;
}

.helpline {
	background-color: #f0ebe2; 
	border-style: none;
}


/* BBCode
 ------------ */
.quotetitle, .attachtitle {
	margin: 10px 5px 0 5px;
	padding: 4px;
	border-width: 0px 0px 0px 0px;
	border-style: solid;
	border-color: #9f4c09;
	color: #444444; 
	/*background-color: #ffcf8c; */
	font-size: 1em;
	font-weight: bold;
}

.quotetitle .quotetitle {
	font-size: 1em;
}

.quotecontent, .attachcontent {
	margin: 0 5px 10px 5px;
	padding: 5px;
	border-color: #998b75;
	border-width: 1px 1px 1px 1px;
	border-style: solid;
	font-weight: normal;
	font-size: 1em;
	line-height: 140%;
	font-family: "Lucida Grande", "Trebuchet MS", Helvetica, Arial, sans-serif;
	background-color: #FAFAFA;
	color: #444444; 
}

.attachcontent {
	font-size: 0.85em;
}

.codetitle {
	margin: 10px 5px 0 5px;
	padding: 2px 4px;
	border-width: 0px 0px 0px 0px;
	border-style: solid;
	border-color: #9f4c09;
/*	color: #333333;
	background-color: #A9B8C2; */
	font-family: "Lucida Grande", Verdana, Helvetica, Arial, sans-serif;
	font-size: 1em;
}

.codecontent {
	direction: ltr;
	margin: 0 5px 10px 5px;
	padding: 5px;
	border-color: #998b75;
	border-width: 1px 1px 1px 1px;
	border-style: solid;
	font-weight: normal;
	color: #006600;
	line-height: 140%;
	font-size: 1em;
	font-family: Monaco, 'Courier New', monospace;
	background-color: #FAFAFA;
}

.syntaxbg {
	color: #FFFFFF;
}

.syntaxcomment {
	color: #FF8000;
}

.syntaxdefault {
	color: #0000BB;
}

.syntaxhtml {
	color: #000000;
}

.syntaxkeyword {
	color: #007700;
}

.syntaxstring {
	color: #DD0000;
}


/* Private messages
 ------------------ */
.pm_marked_colour {
	background-color: #000000;
}

.pm_replied_colour {
	background-color: #A9B8C2;
}

.pm_friend_colour {
	background-color: #007700;
}

.pm_foe_colour {
	background-color: #DD0000;
}


/* Misc
 ------------ */
img {
	border: none;
}

.sep {
	color: black;
	background-color: #FFA34F;
}

table.colortable td {
	padding: 0;
}

pre {
	font-size: 1.1em;
	font-family: Monaco, 'Courier New', monospace;
}

.nowrap {
	white-space: nowrap;
}

.username-coloured {
	font-weight: bold;
}

/* Post signature */
.signature {
   margin-top: 1.5em;
   padding-top: 0.2em;
   font-size: 1em;
   border-top: 0px solid #CCCCCC;
   clear: left;
   line-height: 140%;
   overflow: hidden;
   width: 100%;
}


/* nav1 */
#mastWrapper {
	background-color: #857864;
}

#masthead
{
	position:relative;
	background: url('styles/ubuntu/theme/images/header-image4.png') no-repeat transparent;
	border-style: solid;
	border-width: 0;
	color: #000000;
	height: 70px;
}

#masthead h1
{
/*	//display: none; */		/* we'll show an image instead */
	text-indent:-10000px;
	margin:0;
}

#nav1
{
	position:absolute;
/*	bottom:0px; */
	top:30px;
	right:10px;
	font: normal 12px Verdana, Arial, Helvetica, sans-serif;
}

#nav1 ul
{
	margin:0;
	padding:10px 10px 0 20px;
	list-style:none;
}

#nav1 li
{
	float:left;
	background:url("styles/ubuntu/theme/images/tab_off_ns1.gif") no-repeat left top;
	margin:0;
	padding:0 0 0 5px;
}

#nav1 a
{
	float:left;
	font-size: 1em;
	display:block;
	background:url("styles/ubuntu/theme/images/tab_off_ns2.gif") no-repeat right top;
	padding:10px 15px 4px 8px;
	text-decoration:none;
	font-weight:bold;
	color:#444;
}

/* Commented Backslash Hack hides rule from IE5-Mac \*/
#nav1 a {float:none;}
/* End IE5-Mac hack */
#nav1 a:hover {
	color:#333;
}

#nav1 li:hover, #nav1 li:hover a
{
	background-position:0% -163px;
	color:#000;
}

#nav1 li:hover a
{
	background-position:100% -163px;
	color:#000;
}

#nav1 #current
{
	background:url("styles/ubuntu/theme/images/tab_on_ns1.gif") no-repeat left top;
}

#nav1 #current a
{
	background:url("styles/ubuntu/theme/images/tab_on_ns2.gif") no-repeat right top;
	padding-bottom:4px;
	color:#000;
}

#sitesearch
{
   text-align:right;
   position:absolute;
   top:12px;
   right:30px;
}

			

