<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
      margin: 0;
    }

    html {
      box-sizing: border-box;
    }

    *,
    *:before,
    *:after {
      box-sizing: inherit;
    }

    .column {
      float: left;
      width: 33.3%;
      margin-bottom: 16px;
      padding: 0 8px;
    }

    .card {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      margin: 8px;
    }

    .about-section {
      padding: 50px;
      text-align: center;
      background-color: #10b37c;
      color: white;
    }

    .container {
      padding: 0 16px;
    }

    .container::after,
    .row::after {
      content: "";
      clear: both;
      display: table;
    }

    .title {
      color: grey;
    }

    .button {
      border: none;
      outline: 0;
      display: inline-block;
      padding: 8px;
      color: white;
      background-color: #10b37c;
      text-align: center;
      cursor: pointer;
      width: 100%;
    }

    .button:hover {
      background-color: #555;
    }

    @media screen and (max-width: 650px) {
      .column {
        width: 100%;
        display: block;
      }
    }
  </style>
</head>

<body>
  

    <div class="about-section">
      <h1>About Us </h1>
      <p>We believe in a future full of possibilities and are committed to ensuring that tomorrow's generation can shape
        their own future - especially those from a socially disadvantaged environment. As neighbors at over 35 locations
        in Germany, we support social issues where employees live and work.</p>

    </div>

    <h2 style="text-align:center">Our Team</h2>
    <div class="row">
      <div class="column">
        <div class="card">
          <img
            src="https://media.istockphoto.com/photos/truck-in-warehouse-cargo-transport-picture-id479034198?b=1&k=20&m=479034198&s=170667a&w=0&h=RZnlhbShQHFIG_-1DDsX5NH9ab8ofgiMeI5iNlYcamU="
            alt="" style="width:100%">
          <div class="container">
            <h2>Logistics centers</h2>
            <p class="title">More than 1,000 jobs</p>
            <p>We call our warehouse a logistics center or “fulfillment center”. This is where the complete
              “fulfillment”, ie the processing of customer orders, takes place from the first to the last step: Goods
              are delivered by the manufacturers and sent directly to the customer.</p>

            <p><button class="button">Contact</button></p>
          </div>
        </div>
      </div>

      <div class="column">
        <div class="card">
          <img src="https://cdn.pixabay.com/photo/2018/04/08/10/07/sustainability-3300869__340.jpg" alt=""
            style="width:100%">
          <div class="container">
            <h2>Sustainability</h2>
            <p class="title">CO2-neutral by 2040</p>
            <p>At Famazone, we advocate sustainable innovations every day because they are not only good for the
              environment, but also for the customer. By diversifying our energy portfolio, for example, we can keep
              operating costs low and pass further savings on to customers. This is a win for everyone.</p>

            <p><button class="button">Contact</button></p>
          </div>
        </div>
      </div>

      <div class="column">
        <div class="card">
          <img
            src="https://media.istockphoto.com/photos/business-colleagues-with-face-masks-brainstorming-about-new-business-picture-id1251667476?b=1&k=20&m=1251667476&s=170667a&w=0&h=-oE7MxrkM2WnDREgwiQwHCqt2pQcxSH4Eba_qgZdbAM="
            alt="" style="width:100%">
          <div class="container">
            <h2>Promote entrepreneurship</h2>
            <p class="title"> partner & Programs</p>
            <p>It is often the radical inventions that inspire others to follow their creativity, to realize their
              dreams and to venture into the future. These are stories from inventors, authors, companies and employees.
              You are reshaping your life with Famazone.</p>

            <p><button class="button">Contact</button></p>
          </div>
        </div>
      </div>
    </div>

 

</body>

</html>