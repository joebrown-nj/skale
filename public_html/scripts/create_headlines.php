<?php

// ini_set("display_errors", "1");
// ini_set("display_startup_errors", "1");
// error_reporting(E_ALL);

// $file = "C:/wamp64/www/skaleup/headlines.htm";
// $html = file_get_contents($file);
// $html = str_ireplace(array("\r","\n","\r","\n"),"", $html);

// die($html);
// $handle = fopen($html, "r");

// while(! feof($handle)) {
//   $line = fgets($handle);
//   echo $line. "<br>";
// }

// fclose($handle);

// $doc = new DOMDocument();
// $doc->loadHTML("<?xml encoding="UTF-8">" . $html);

// dirty fix
// foreach ($doc->childNodes as $item){
//     // if ($item->nodeType == XML_PI_NODE)
//     //     $doc->removeChild($item); // remove hack
//     echo $item->nodeType;
//     echo "<hr>";
// }

// $doc = new DOMDocument();
// $doc->loadHTML($html);
// $doc->encoding = "UTF-8"; // insert proper
// showDOMNode($doc);

// function showDOMNode(DOMNode $domNode, $n=0) {
//     foreach ($domNode->childNodes as $node)
//     {
//         echo $n.": nodeName: ".$node->nodeName." - nodeValue: ".$node->nodeValue."<br>";
//         if($node->childNodes->length != 1) {
//             echo "hasChildNodes ".$n."<br>";
//             showDOMNode($node,$n+1);
//         }
//     }    
// }


// $newDom = DOM\HTMLDocument::createFromString($html);
// $paragraphs = $newDom->querySelectorAll("p");
// echo "{$paragraphs->length} paragraphs found.";
?>


INSERT INTO `home_page` (type, title, headline, subHeading, text) VALUES 
("Bold & Professional", 
"Build. Secure. Scale", 
"Build. Secure. Scale", 
"From cutting-edge web design to reliable IT solutions, Skale Up helps your business thrive in a digital-first world.", 
""),


("Modern & Startup Vibe", 
"Your Growth, Our Mission", 
"Your Growth, Our Mission", 
"We craft sleek websites, powerful digital strategies, and scalable IT systems to fuel your business success.", 
""),


("Creative & Techy", 
"Design. Code. Innovate.", 
"Design. Code. Innovate.", 
"Skale Up transforms ideas into digital experiences while keeping your business tech sharp, secure, and future-ready.", 
""),


("Results-Driven", 
"Scale Beyond Limits", 
"Scale Beyond Limits", 
"Whether it’s stunning websites, seamless IT, or smart digital marketing—Skale Up powers your business to the next level.", 
""),


("Simple & Direct", 
"Smarter Web & IT Solutions", 
"Smarter Web & IT Solutions", 
"We combine creativity, technology, and strategy to help businesses grow and scale with confidence.", 
""),


("Short & Punchy Versions (great for clean/minimal modern)", 
"Skale Up. Stand Out.", 
"Skale Up. Stand Out.", 
"Web design and IT solutions built for growth.", 
""),


("Simple", 
"Design That Delivers", 
"Design That Delivers", 
"Smart websites. Smarter IT.", 
""),


("Simple", 
"Fuel Your Growth", 
"Fuel Your Growth", 
"Seamless web and IT solutions that scale with you.", 
""),


("Longer & Benefit-Driven Versions (great for SEO, storytelling & conversions)", 
"Empowering Businesses With Smarter Web & IT Solutions", 
"Empowering Businesses With Smarter Web & IT Solutions", 
"At Skale Up, we design impactful websites, deliver reliable IT services, and create strategies that help your business grow faster, stronger, and smarter.", 
""),


("Simple", 
"Where Innovation Meets Growth", 
"Where Innovation Meets Growth", 
"From custom web development to IT management, Skale Up equips your business with the tools, technology, and expertise to thrive in a digital world.", 
""),


("Simple", 
"Scaling Businesses Into the Future", 
"Scaling Businesses Into the Future", 
"Skale Up combines modern design, cutting-edge development, and expert IT solutions to help your brand reach new heights with confidence.", 
""),


("Growth-Driven", 
"Your Website Shouldn’t Just Exist—It Should Sell.", 
"Your Website Shouldn’t Just Exist—It Should Sell.", 
"At Skale Up, we design and optimize websites that turn clicks into customers and growth into scale.", 
""),


("Challenging & Bold", 
"If Your Website Isn’t Driving Sales, It’s Failing.", 
"If Your Website Isn’t Driving Sales, It’s Failing.", 
"We build conversion-focused websites and IT systems that help your business thrive—not just survive.", 
""),


("Future-Focused", 
"Stop Settling for “Good Enough” Tech.", 
"Stop Settling for “Good Enough” Tech.", 
"Skale Up delivers sleek design, flawless development, and future-ready IT solutions that keep you ahead of competitors.", 
""),


("Results-Oriented", 
"Don’t Just Compete. Dominate.", 
"Don’t Just Compete. Dominate.", 
"With expert web design, IT, and automation, Skale Up gives your business the tools to lead your industry.", 
""),


("Urgency-Driven", 
"Every Day Without the Right Website Costs You Customers.", 
"Every Day Without the Right Website Costs You Customers.", 
"We create powerful websites and IT systems that turn lost opportunities into measurable growth.", 
""),


("Growth-Driven (Short/Emotional)", 
"Your Website Should Sell. Not Just Exist.", 
"Your Website Should Sell. Not Just Exist.", 
"Subheading: Skale Up designs websites that turn clicks into customers.", 
""),


("Growth-Driven (Longer/Logical)", 
"Your Website Is Your Strongest Sales Tool—If Built Right.", 
"Your Website Is Your Strongest Sales Tool—If Built Right.", 
"We combine design, development, and IT solutions that convert visitors into loyal customers.", 
""),


("Bold & Challenging (Short/Emotional)", 
"If It’s Not Converting, It’s Failing.", 
"If It’s Not Converting, It’s Failing.", 
"Skale Up builds sites that grow revenue, not bounce rates.", 
""),


("Bold & Challenging (Longer/Logical)", 
"Most Websites Look Nice. Few Actually Drive Sales.", 
"Most Websites Look Nice. Few Actually Drive Sales.", 
"Our strategy-driven design and IT solutions ensure your website becomes a revenue engine.", 
""),


("Urgency-Driven (Short/Emotional)", 
"Every Click You Lose Is a Customer You’ll Never Get Back.", 
"Every Click You Lose Is a Customer You’ll Never Get Back.", 
"Stop losing sales—Skale Up builds growth-focused web and IT solutions.", 
""),


("Urgency-Driven (Longer/Logical)", 
"Every Day Without the Right Website Costs You Opportunities.", 
"Every Day Without the Right Website Costs You Opportunities.", 
"Skale Up helps businesses scale faster with conversion-first design and reliable IT systems.", 
""),


("Competitive Edge (Short/Emotional)", 
"Don’t Compete. Dominate.", 
"Don’t Compete. Dominate.", 
"Scale your brand with powerful web design and IT solutions.", 
""),


("Competitive Edge (Longer/Logical)", 
"Competing Online Isn’t Enough Anymore—You Need to Lead.", 
"Competing Online Isn’t Enough Anymore—You Need to Lead.", 
"Skale Up empowers businesses with sleek design, cutting-edge development, and future-ready IT services.", 
"");