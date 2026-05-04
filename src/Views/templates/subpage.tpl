{include file="inc/layout/header.tpl"}

{if isset($page.content)}
    {$page.content->content}
{/if}

{include file="inc/layout/footerContactForm.tpl"}
{include file="inc/layout/footer.tpl"}


{* <!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Systems That Scale Businesses | Skale</title>
      <meta name="description" content="Skale designs and builds scalable systems that connect your technology, marketing, and operations - so your business runs efficiently and grows without friction.">
      <meta name="keywords" content="IT solutions, software development, automation, web development, digital marketing, PPC, SEO, email marketing, business automation">
      <!-- Open Graph -->
      <meta property="og:title" content="Systems That Scale Businesses | Skale">
      <meta property="og:description" content="We build integrated systems that drive revenue, automate operations, and scale your business.">
      <meta property="og:type" content="website">
      <meta property="og:url" content="https://skaleup.it.com/">
      <meta property="og:image" content="https://skaleup.it.com/images/og-image.jpg">
      <!-- Favicon -->
      <link rel="icon" href="/favicon.ico">
      <!-- Basic Styling Placeholder -->
      <link rel="stylesheet" href="/styles.css">
   </head>
   <body>
      <header>
         <nav>
            <div class="logo">Skale</div>
            <ul>
               <li><a href="/services">Services</a></li>
               <li><a href="/solutions">Solutions</a></li>
               <li><a href="/about">About</a></li>
               <li><a href="/contact" class="cta">Get Started</a></li>
            </ul>
         </nav>
      </header>
      <main>
         <!-- HERO -->
         <section class="hero">
            <div class="container">
               <h1>Systems That Scale Businesses</h1>
               <p>We design and build integrated systems that connect your technology, marketing, and operations - so your business runs efficiently, generates consistent revenue, and scales without friction.</p>
               <div class="cta-buttons">
                  <a href="/contact" class="btn-primary">Get a Free Growth Audit</a>
                  <a href="/contact" class="btn-secondary">Book a Strategy Call</a>
               </div>
            </div>
         </section>
         <!-- POSITIONING -->
         <section class="positioning">
            <div class="container">
               <h2>Most Businesses Don't Have a Growth Problem - They Have a Systems Problem</h2>
               <p>Disconnected tools. Manual workflows. Inconsistent lead flow. These aren't isolated issues - they're symptoms of a broken system.</p>
               <p><strong>Skale fixes that.</strong> We design and build integrated systems that align your marketing, technology, and operations - so everything works together to drive growth.</p>
            </div>
         </section>
         <!-- SERVICES -->
         <section class="services">
            <div class="container">
               <h2>We Build the Infrastructure Behind Scalable Businesses</h2>
               <div class="service-grid">
                  <div class="service">
                     <h3>Growth Infrastructure</h3>
                     <p>Build the foundation your business runs on.</p>
                     <ul>
                        <li>High-performance websites</li>
                        <li>Funnel architecture & optimization</li>
                        <li>CRM and lead tracking systems</li>
                     </ul>
                     <a href="/services/web-development">Learn More</a>
                  </div>
                  <div class="service">
                     <h3>Automation & Software</h3>
                     <p>Replace manual work with intelligent systems.</p>
                     <ul>
                        <li>Workflow automation</li>
                        <li>Custom software solutions</li>
                        <li>AI-powered reporting tools</li>
                     </ul>
                     <a href="/services/software-development">Learn More</a>
                  </div>
                  <div class="service">
                     <h3>Demand Generation</h3>
                     <p>Create consistent, scalable lead flow.</p>
                     <ul>
                        <li>PPC campaigns</li>
                        <li>SEO optimization</li>
                        <li>Email marketing systems</li>
                     </ul>
                     <a href="/services/marketing">Learn More</a>
                  </div>
                  <div class="service">
                     <h3>Strategy & Optimization</h3>
                     <p>Make smarter decisions with better systems.</p>
                     <ul>
                        <li>Growth audits</li>
                        <li>Tech stack optimization</li>
                        <li>Performance analytics</li>
                     </ul>
                     <a href="/services/consulting">Learn More</a>
                  </div>
               </div>
            </div>
         </section>
         <!-- PROCESS -->
         <section class="process">
            <div class="container">
               <h2>A Systematic Approach to Scaling Your Business</h2>
               <div class="steps">
                  <div class="step">
                     <h3>1. Diagnose</h3>
                     <p>Identify inefficiencies, gaps, and missed opportunities.</p>
                  </div>
                  <div class="step">
                     <h3>2. Architect</h3>
                     <p>Design a scalable system tailored to your business.</p>
                  </div>
                  <div class="step">
                     <h3>3. Build & Integrate</h3>
                     <p>Implement your infrastructure and systems.</p>
                  </div>
                  <div class="step">
                     <h3>4. Optimize & Scale</h3>
                     <p>Refine, automate, and grow continuously.</p>
                  </div>
               </div>
            </div>
         </section>
         <!-- RESULTS -->
         <section class="results">
            <div class="container">
               <h2>What Happens When Your Systems Work Together</h2>
               <ul>
                  <li>More consistent and qualified lead flow</li>
                  <li>Reduced manual workload and operational overhead</li>
                  <li>Improved conversion rates</li>
                  <li>Clear visibility into performance</li>
               </ul>
            </div>
         </section>
         <!-- WHY SKALE -->
         <section class="why">
            <div class="container">
               <h2>Where Engineering Meets Growth</h2>
               <p>Most agencies focus on one piece. We connect software, automation, marketing, and infrastructure into one cohesive system.</p>
               <ul>
                  <li>Systems-first approach</li>
                  <li>Full-stack execution</li>
                  <li>Built for long-term scalability</li>
               </ul>
            </div>
         </section>
         <!-- AUDIENCE -->
         <section class="audience">
            <div class="container">
               <h2>Who This Is For</h2>
               <ul>
                  <li>Growing businesses facing operational friction</li>
                  <li>Teams with disconnected tools and systems</li>
                  <li>Companies looking to automate and scale</li>
                  <li>Businesses ready for long-term growth</li>
               </ul>
            </div>
         </section>
         <!-- CTA -->
         <section class="cta">
            <div class="container">
               <h2>Your Business Shouldn't Feel This Hard to Run</h2>
               <p>If your systems are slowing you down, it's time to fix the foundation.</p>
               <a href="/contact" class="btn-primary">Get Your Free Growth Audit</a>
            </div>
         </section>
      </main>
      <footer>
         <div class="container">
            <p><strong>Skale</strong>  -  Systems That Scale Businesses</p>
            <nav>
               <a href="/services">Services</a>
               <a href="/about">About</a>
               <a href="/contact">Contact</a>
            </nav>
            <p>&copy; 2026 Skale. All rights reserved.</p>
         </div>
      </footer>
   </body>
</html> *}