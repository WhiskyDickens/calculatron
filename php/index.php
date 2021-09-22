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
        <div class="flex:1">
          <a href="https://simtaylor.com/web-apps" style="margin-right:1rem" class="btn btn-text mt-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16"><path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/><path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/></svg></a>
          <a href="https://github.com/WhiskyDickens/calculatron" style="flex:1;color:black" target="_blank" class="btn btn-text mt-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16"><path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/></svg></a>
        </div>
        <nav style="flex:12">
          <ul>
            <li><a href="#expression">Expression</a></li>
            <li><a href="#basics">Basics</a></li>
            <li><a href="#percentages">Percentages</a></li>
          </ul>
        </nav>
        <input style="flex:2" type="text" name="search" placeholder="Search calculations">
      </div>
    </header>

    <!-- Start: Free text -->
    <section id="expression" class="container">
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
      <form action="calculate.php?basic" method="POST">
        <input type="hidden" name="operator" value="+" required>
        <input type="number" step="0.00000000000001" name="num-1" required><span class='symbol'> + </span>
        <input type="number" step="0.00000000000001" name="num-2" required>
        <button type="button" class="add-field">Add Field</button>
        <button type="submit">Calculate</button>
        <div class="response"></div>
      </form>
      
      <strong>Subtraction</strong>
      <form action="calculate.php?basic" method="POST">
        <input type="hidden" name="operator" value="-" required>
        <input type="number" step="0.00000000000001" name="num-1" required><span class='symbol'> - </span>
        <input type="number" step="0.00000000000001" name="num-2" required>
        <button type="button" class="add-field">Add Field</button>
        <button type="submit">Calculate</button>
        <div class="response"></div>
      </form>
      
      <strong>Multiplication</strong>
      <form action="calculate.php?basic" method="POST">
        <input type="hidden" name="operator" value="*" required>
        <input type="number" step="0.00000000000001" name="num-1" required><span class='symbol'> * </span>
        <input type="number" step="0.00000000000001" name="num-2" required>
        <button type="button" class="add-field">Add Field</button>
        <button type="submit">Calculate</button>
        <div class="response"></div>
      </form>
      
      <strong>Division</strong>
      <form action="calculate.php?basic" method="POST">
        <input type="hidden" name="operator" value="/" required>
        <input type="number" step="0.00000000000001" min="0.00000000000001" name="num-1" required><span class='symbol'> / </span>
        <input type="number" step="0.00000000000001" min="0.00000000000001" name="num-2" required>
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

    <hr>

    <script src="../assets/js/scripts.js"></script>
  </body>
  </html>