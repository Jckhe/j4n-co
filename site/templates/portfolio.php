<? snippet('header') ?>
<? snippet('site_nav') ?>

<section class="main has_shadow">

<div class="centered_measure with_top_margin with_bottom_margin"> 
<header>
<h1 class='text_shadow project_title'>Jan Drewniak</h1>
<h2 class='subhead'>UX Design + Development Ninja Assassin</h2>
</header>
<p>
Jan Drewniak is a UX design/developer from Toronto. He like art, code and combining the two.He dislikes writing in the third person. I specialize in interface design, specifically web interfaces.I'm adept at web-technologies (HTML/CSS/JS) and I know enough back-end code to be dangerous.
The thing that drives me is my love for designing interactions, wether it be for fun or for profit.
</p>

<section>
  <h3>
    experience
  </h3>
  <dl>
    <dt>
      Algrin Technologies Inc.
    </dt>
    <dd>
      <span class='underline'>
        Interface Designer (2009 - present)
      </span>
      <br>
        At Algrin Technologies I'm in charge of product design, web design and front-end development. I design and develop user interface for our web apps, SkedX and Bridge.
      </br>
    </dd>
  </dl>
  <dl>
    <dt>
      SWARM
    </dt>
    <dd>
      <span class='underline'>
        Partner (2009)
      </span>
      <br>
        At SWARM I produced an integrated advertising campaign and related marketing material for a high-end furniture retailer in downtown Toronto.
      </br>
    </dd>
  </dl>
  <dl>
    <dt>
      Smith Roberts
      <br />
      Creative Co.
    </dt>
    <dd>
      <span class='underline'>
        Art Director (2008-2009)
      </span>
      <br>
        At Smith Roberts I was responsible for generating advertising campaign ideas and producing the visual look and feel for many local clients.
      </br>
    </dd>
  </dl>
  <dl>
    <dt>
      Mobile Digital Commons Network
    </dt>
    <dd>
      <span class='underline'>
        Intern (2007-2008)
      </span>
      <br>
        At the M.D.C.N. I assisted in organizing a national conference on Mobile technology and assisted in projects involving GSP enabled mobile gaming (before we had iPhones).
      </br>
    </dd>
  </dl>
</section>

<section>
  <h3>
    education
  </h3>
  <dl>
    <dt>
      Ontario College
      <br />
      Of Art And Design
    </dt>
    <dd>
      <span class='underline'>
        Bachelor in Design - Advertising Art Direction (2003 - 2007)
      </span>
    </dd>
  </dl>
</section>

<section>
  <h3>
    recognition
  </h3>
  <ul>
    <li>
      2007 Student Gold, Advertising & Design Club of Canada
    </li>
    <li>
      2006 Student Silver, Marketing Awards
    </li>
  </ul>
</section>

<section>
  <h3 class='text_shadow'>
    projects:
  </h3> 
  <? foreach ($page->children()->visible() AS $p): ?>
  <a class='thumbnail large_thumbnail has_shadow' href='<?= $p->url() ?>'>
    <p class='page_description white_pixel_font large'>
      <?= $p -> title() ?>
    </p>
    <img src='<?= $p->files()->find('icon.png')->url()?>' />
  </a>
  <? endforeach ?> 
</section>
</div>
</section>

<? snippet('footer') ?>