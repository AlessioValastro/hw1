<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Unriddle | Faster research</title>
    <link rel="icon" href="public/vector4.svg">
    <link rel="stylesheet" href="index.css" />
    <!-- font family -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap"
      rel="stylesheet"
    />
    <script defer src="app.js"></script>
  </head>
  <body>
    <nav>
      <section class="nav__section">
        <div class="nav__section--logo">
          <img src="public/vector4.svg" alt="" />
          <img src="public/vector5.svg" alt="" class="nav__logo--unriddle" />
        </div>
        <div class="nav__section--menu">
          <a href="">Prising</a>
          <a href="" id="affiliate">Affiliate</a>
          <button id="login" class="login-button"><a href="log-in.php">Log in</a></button>
          <button ><a href="sign-up.php" id="signup">Sign up</a></button>
        </div>
      </section>
    </nav>

    <main>
      <section class="hero-section">
        <header>
          <h1>
            Read <span class="highligth yellow__highlight">faster.</span> <br />
            Write
            <span class="underline__container"
              >better<img
                src="public/vector3.svg"
                alt=""
                class="underline__container--line" /></span
            >.
          </h1>
          <p>
            Quickly find info in documents, simplify complex <br class="mobile-hidden">
            topics, take notes and write with the power of AI.
          </p>
          <button>Get started <span class="mobile-hidden">free</span></button>
          <div class="header__researchers">
            <span>Join 500,000+ researchers</span>
            <div class="header__researchers--carousell">
              <img src="public/13.jpg" alt="" class="z-index1" />
              <img src="public/27.jpg" alt="" class="z-index2" />
              <img src="public/33.jpg" alt="" class="z-index3" />
              <img src="public/42.jpg" alt="" class="z-index4" />
              <img src="public/72.jpg" alt="" class="z-index5" />
              <img src="public/86.jpg" alt="" class="z-index6" />
              <img src="public/91.jpg" alt="" class="z-index7" />
            </div>
          </div>
          <img src="public/landing-hero.webp" alt="" class="header__hero-img" />
        </header>
      </section>

      <section class="trust">
        <div class="trust__info">
          <h2>
            <span class="highligth green__highlight">Trusted by thousands</span>
            of <br />
            researchers and students
          </h2>
          <p>From the classroom to the boardroom.</p>
        </div>
        <div class="trust__imgs">
          <img src="public/harvard-logo.svg" alt="" />
          <img src="public/meta-logo.svg" alt="" />
          <img src="public/caltech-logo.svg" alt="" />
          <img src="public/nyu-logo.svg" alt="" />
          <img src="public/sp-logo.svg" alt="" />
          <img src="public/stanford-logo.svg" alt="" />
          <img src="public/instacart-logo.svg" alt="" />
          <img src="public/mckinsey-logo.svg" alt="" />
          <img src="public/cambridge-logo.svg" alt="" />
          <img src="public/mit-logo.svg" alt="" />
        </div>
      </section>

      <section class="section__type">
        <h2>
          It all starts with your <br />
          <span class="highligth lightgray__highlight"
            >information sources.</span
          >
        </h2>
        <p>
          Unriddle generates an AI assistant on top of any document so you can
          <br />
          quickly find, summarize and understand info. No more endless skimming.
        </p>
        <img src="public/landing-doc.webp" alt="" />
      </section>

      <section class="section__type">
        <h2>
          Exactly what you need at
          <span class="highligth pink__highlight">the</span> <br />
          <span class="highligth pink__highlight">exact moment</span> you need
          it.
        </h2>
        <p>
          Unriddle understands the meaning behind your writing and automatically
          links you to relevant things you’ve read and written about in the
          past.
        </p>
        <img src="public/landing-relation.webp" alt="" />
      </section>

      <section class="section__type">
        <h2>
          Easily write,<span class="highligth green__highlight">cite</span> and
          <br />uncover hidden themes.
        </h2>
        <p>
          Highlight text and Unriddle will show you the most relevant sources
          from your library using AI. Never lose a citation again.
        </p>
        <img src="public/landing-cite.webp" alt="" />
      </section>

      <section class="explore">
        <h2>
          Explore more ideas. <br />
          Wade through less pages.
        </h2>
        <div class="explore__grid">
          <div class="explore__grid--item grid__item--1">
            <p>
              <strong>Graph view <br /></strong>
              Visualize relationships between items in your library to find
              connections.
            </p>
            <img src="public/image2.png" alt="" />
            <div class="explore__item--shadow"></div>
          </div>
          <div class="explore__grid--item grid__item--2">
            <p>
              <strong>Chrome extension <br /></strong>
              Reading on the web? Summarize any article with <br />a single
              click using our browser extension.
            </p>
            <img src="public/chrome.png" alt="" class="mobile-hidden"/>
            <div class="explore__item--shadow"></div>
          </div>
          <div class="explore__grid--item grid__item--2">
            <p>
              <strong>90+ languages supported <br /></strong>
              Including English, French, German, Spanish, Italian,
              Portuguese,<br />
              Russian, Japanese, Korean, Chinese and more.
            </p>
            <img src="public/image3.png" alt="" />
            <div class="explore__item--shadow"></div>
          </div>
          <div class="explore__grid--item grid__item--1">
            <p>
              <strong>Full control <br /></strong>
              Adjust the model, temperature and response length in settings.
            </p>
            <img src="public/settings.svg" alt="" />
            <div class="explore__item--shadow"></div>
          </div>
          <div class="explore__grid--item grid__item--1">
            <p>
              <strong>Intelligence baked in <br /></strong> Auto-generated
              prompts, relations, titles, sorting and more.
            </p>
            <img src="public/ai.svg" alt="" />
            <div class="explore__item--shadow"></div>
          </div>
          <div class="explore__grid--item grid__item--2">
            <p>
              <strong>Group sources <br /></strong>
              Interact with many documents at once to find <br />
              information across several sources.
            </p>
            <img src="public/features-group.webp" alt="" />
            <div class="explore__item--shadow"></div>
          </div>
        </div>
      </section>

      <section class="friends">
        <h2>Friends of Unriddle</h2>
        <p>See what people are saying</p>
        <div class="friends__box"></div>
      </section>

      <section class="section__type">
        <h2>
          From first drafts to final touches, <br />
          ensure your words
          <span class="highligth yellow__highlight"> always shine.</span>
        </h2>
        <p>
          Generate text with AI-autocomplete to improve and expand your writing,
          <br />
          with all suggestions based on the context of what you're working on.
        </p>
        <img src="public/landing-ai.webp" alt="" />
      </section>

      <section class="section__type">
        <h2>
          <span class="highligth pink__highlight">Bring your team</span> into
          the <br />mix with Unriddle Teams.
        </h2>
        <p>
          Step into a collaborative workspace where everyone can <br />
          contribute and chat with the same documents in real-time.
        </p>
        <img src="public/landing-team.webp" alt="" />
      </section>

      <section class="creator">
        <h2>Join our creator program and <br class="mobile-hidden"/>earn up to 50% commission</h2>
        <p>
          As an Unriddle creator, you’ll share Unriddle with your audience,
          <br class="mobile-hidden"/>
          earn commission on sales and get access to the platform.
        </p>
        <div class="creator__link">
          <a href="">Learn more -></a>
        </div>
      </section>

      <section class="faq">
        <h2>Frequently asked questions</h2>
        <div class="faq__container">
          <div class="faq__container--row">
            <h3 class="faq__row--question">
              What languages does Unriddle support?
              <img src="public/vector.svg" alt="" />
            </h3>
            <p class="faq__row--answer">
              Unriddle supports over 90 languages including, but not limited to,
              English, Spanish, French, German, Portuguese, Italian, Dutch,
              Russian, Arabic, Chinese, Japanese, Korean, Hindi, Bengali, Urdu,
              Turkish, Polish, Swedish, Norwegian, Danish, Finnish, Hebrew,
              Thai, Vietnamese, Indonesian and Malay.
            </p>
          </div>
          <div class="faq__container--row">
            <h3 class="faq__row--question">
              Can I trust Unriddle to give me accurate information?
              <img src="public/vector.svg" alt="" />
            </h3>
            <p class="faq__row--answer">
              Yes. We designed the system to work with your own data sources,
              answering questions based only on the information you provide. And
              it’ll let you know if it can’t find an answer. So if you trust the
              source documents, you can trust Unriddle’s response!
            </p>
          </div>
          <div class="faq__container--row">
            <h3 class="faq__row--question">
              How do I get support if I have an issue?
              <img src="public/vector.svg" alt="" />
            </h3>
            <p class="faq__row--answer">
              Email support@unriddle.ai and we’ll get back to you within a day.
            </p>
          </div>
        </div>
      </section>

      <section class="cta">
        <div class="cta__content">
          <h2>Get started for free</h2>
          <p>Take Unriddle for a spin today. No card required.</p>
          <div class="cta__content--button">
            <button>Try Unriddle free</button>
          </div>
        </div>
      </section>

      <footer>
        <div class="nav__section--logo footer__logo">
          <img src="public/vector4.svg" alt="" class="mobile-hidden"/>
          <img src="public/vector5.svg" alt="" class="nav__logo--unriddle" />
        </div>
        <div class="footer__links">
          <div class="footer__links--column">
            <h3>Resources</h3>
            <a href="">Guide</a>
            <a href="">Changelog</a>
            <a href="">Affiliate</a>
            <a href="">FAQs</a>
          </div>
          <div class="footer__links--column">
            <h3>Company</h3>
            <a href="">About</a>
            <a href="">Careers</a>
            <a href="">Contact</a>
          </div>
          <div class="footer__links--column">
            <h3>Socials</h3>
            <a href="">Twitter</a>
            <a href="">Tik Tok</a>
            <a href="">LinkedIn</a>
            <a href="">Instagram</a>
          </div>
          <div class="footer__links--column">
            <h3>Legal</h3>
            <a href="">Terms</a>
            <a href="">Privacy</a>
          </div>
        </div>
        <div class="footer__company">
          <p>© 2023 Unriddle Ltd</p>
          <div class="footer__company--imgs">
            <img src="public/vector2.svg" alt="" />
            <img src="public/vector6.svg" alt="" />
          </div>
        </div>
      </footer>
    </main>
  </body>
</html>
