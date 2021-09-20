<?php

  /**
   * Calculatron
   * Making every-day calculations much simpler
   */

?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculatron PHP - Simon Taylor's Portfolio</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
  </head>
  <body>

    <header>
      <div class="container">
        <nav>
          <ul>
            <li><a href="#basics">Basics</a></li>
            <li><a href="#percentages">Percentages</a></li>
          </ul>
        </nav>
        <input type="text" name="search" placeholder="Search calculations">
      </div>
    </header>

    <!-- Start: Free text -->
    <section id="basics" class="container">
      <h4>Expression</h4>
      <p>Enter your expression below</p>
      <form action="calculate.php?free-text" method="POST">
        <div class="variables">
          <strong>Variables</strong>
          <label for="var-0" class="hide">
            0 = <input type="number" step="0.01" name="var-0">
          </label>
          <button type="button" class="add-variable">Add Variable</button>
        </div>
        <textarea name="calculation" placeholder="2cos(2) + (2+(30/4)*5) + 150 + sqrt(9)" rows="5" style="height:100px;width:100%" required></textarea>
        <button type="submit">Calculate</button>
        <div class="response"></div>
      </form>
    </section>
    <!-- End: Free text -->

    <hr>

    <!-- Start: Basics -->
    <section id="basics" class="container">
      <h4>Basics</h4>
      
      <strong>Addition</strong>
      <form action="calculate.php?add" method="POST">
        <input type="number" step="0.01" name="num-1" required><span class='symbol'> + </span>
        <input type="number" step="0.01" name="num-2" required>
        <button type="button" class="add-field">Add Field</button>
        <button type="submit">Calculate</button>
        <div class="response"></div>
      </form>

    </section>
    <!-- End: Basics -->

    <hr>

    <!-- Start: Percentages -->
    <section id="percentages" class="container">
      <h4>Percentages</h4>

      <form action="calculate.php?perc-what-x-of-y" method="POST">
        What is 
        <input type="number" step="0.01" name="x" required>% of 
        <input type="number" step="0.01" name="y" required>?
        <button type="submit">Calculate</button>
        <div class="response"></div>
      </form>
      
      <form action="calculate.php?perc-x-what-of-y" method="POST">
        <input type="number" step="0.01" name="x" required> is what % of
        <input type="number" step="0.01" name="y" required>?
        <button type="submit">Calculate</button>
        <div class="response"></div>
      </form>
      
      <form action="calculate.php?perc-x-is-y-of-what" method="POST">
        <input type="number" step="0.01" name="x" required> is
        <input type="number" step="0.01" name="y" required>% of what?
        <button type="submit">Calculate</button>
        <div class="response"></div>
      </form>

    </section>
    <!-- End: Percentages -->

    <script src="../assets/js/scripts.js"></script>
  </body>
  </html>