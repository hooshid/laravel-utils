<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex">
<meta name="googlebot" content="noindex">

<style>
    *, *::before, *::after {
        box-sizing: border-box;
    }

    * {
        margin: 0;
        padding: 0;
        outline: 0;
        border: 0;
    }

    body {
        background-color: rgb(243, 244, 246);
    }

    .container {
        position: relative;
        width: 100%;
        max-width: 1300px;
        margin: 0 auto;
        padding: 0 20px;
        box-sizing: border-box;
    }




    /* Base Styles
    –––––––––––––––––––––––––––––––––––––––––––––––––– */
    /* NOTE
    html is set to 62.5% so that all the REM measurements throughout Skeleton
    are based on 10px sizing. So basically 1.5rem = 15px :) */
    html {
        font-size: 62.5%; }
    body {
        font-size: 1.5em; /* currently ems cause chrome bug misinterpreting rems on body element */
        line-height: 1.6;
        font-weight: 400;
        font-family: "Raleway", "HelveticaNeue", "Helvetica Neue", Helvetica, Arial, sans-serif;
        color: #222; }


    /* Typography
    –––––––––––––––––––––––––––––––––––––––––––––––––– */
    h1, h2, h3, h4, h5, h6 {
        margin-top: 0;
        margin-bottom: 2rem;
        font-weight: 300; }
    h1 { font-size: 4.0rem; line-height: 1.2;  letter-spacing: -.1rem;}
    h2 { font-size: 3.6rem; line-height: 1.25; letter-spacing: -.1rem; }
    h3 { font-size: 3.0rem; line-height: 1.3;  letter-spacing: -.1rem; }
    h4 { font-size: 2.4rem; line-height: 1.35; letter-spacing: -.08rem; }
    h5 { font-size: 1.8rem; line-height: 1.5;  letter-spacing: -.05rem; }
    h6 { font-size: 1.5rem; line-height: 1.6;  letter-spacing: 0; }

    /* Larger than phablet */
    @media (min-width: 550px) {
        h1 { font-size: 5.0rem; }
        h2 { font-size: 4.2rem; }
        h3 { font-size: 3.6rem; }
        h4 { font-size: 3.0rem; }
        h5 { font-size: 2.4rem; }
        h6 { font-size: 1.5rem; }
    }

    p {
        margin-top: 0; }


    /* Links
    –––––––––––––––––––––––––––––––––––––––––––––––––– */
    a {
        color: #1EAEDB; }
    a:hover {
        color: #0FA0CE; }

    /* Forms
–––––––––––––––––––––––––––––––––––––––––––––––––– */
    input[type="email"],
    input[type="number"],
    input[type="search"],
    input[type="text"],
    input[type="tel"],
    input[type="url"],
    input[type="password"],
    textarea,
    select {
        height: 38px;
        padding: 6px 10px; /* The 6px vertically centers text on FF, ignored by Webkit */
        background-color: #fff;
        border: 1px solid #D1D1D1;
        border-radius: 4px;
        box-shadow: none;
        box-sizing: border-box; }
    /* Removes awkward default styles on some inputs for iOS */
    input[type="email"],
    input[type="number"],
    input[type="search"],
    input[type="text"],
    input[type="tel"],
    input[type="url"],
    input[type="password"],
    textarea {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none; }
    textarea {
        min-height: 65px;
        padding-top: 6px;
        padding-bottom: 6px; }
    input[type="email"]:focus,
    input[type="number"]:focus,
    input[type="search"]:focus,
    input[type="text"]:focus,
    input[type="tel"]:focus,
    input[type="url"]:focus,
    input[type="password"]:focus,
    textarea:focus,
    select:focus {
        border: 1px solid #33C3F0;
        outline: 0; }
    label,
    legend {
        display: block;
        margin-bottom: .5rem;
        font-weight: 600; }
    fieldset {
        padding: 0;
        border-width: 0; }
    input[type="checkbox"],
    input[type="radio"] {
        display: inline; }
    label > .label-body {
        display: inline-block;
        margin-left: .5rem;
        font-weight: normal; }


    /* Lists
    –––––––––––––––––––––––––––––––––––––––––––––––––– */
    ul {
        list-style: circle inside; }
    ol {
        list-style: decimal inside; }
    ol, ul {
        padding-left: 0;
        margin-top: 0; }
    ul ul,
    ul ol,
    ol ol,
    ol ul {
        margin: 1.5rem 0 1.5rem 3rem;
        font-size: 90%; }
    li {
        margin-bottom: 1rem; }

    /* Tables
–––––––––––––––––––––––––––––––––––––––––––––––––– */
    table {
        width: 100%;
    }

    th,
    td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #E1E1E1; }
    th:first-child,
    td:first-child {
        padding-left: 0; }
    th:last-child,
    td:last-child {
        padding-right: 0; }

    /* Spacing
–––––––––––––––––––––––––––––––––––––––––––––––––– */
    button,
    .button {
        margin-bottom: 1rem; }
    input,
    textarea,
    select,
    fieldset {
        margin-bottom: 1.5rem; }
    pre,
    blockquote,
    dl,
    figure,
    table,
    p,
    ul,
    ol,
    form {
        margin-bottom: 2.5rem; }

    /* Misc
–––––––––––––––––––––––––––––––––––––––––––––––––– */
    hr {
        margin-top: 3rem;
        margin-bottom: 3.5rem;
        border-width: 0;
        border-top: 1px solid #E1E1E1; }

    .back-page {
        position: fixed;
        padding: 5px 13px;
        background: #CE0F45;
        color: #fff;
        text-decoration: none;
        border-radius: 0 30px 30px 0;
        text-align: center;
        left: 0;
        top: 5px;
    }

    .back-page:hover {
        color: #fff;
        background: #E81551;
    }
</style>

<a href="/utils" class="back-page">Back</a>
