<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div id="wrapper">
      <div id="phone">
        <div id="numberDisplay">
          <input type='tel'>
        </div>
        <div id="dialpad" class="button-3">
          <ul>
            <li class="first">1</li>
            <li>2</li>
            <li class="last">3</li>
            <li class="first">4</li>
            <li>5</li>
            <li class="last">6</li>
            <li class="first">7</li>
            <li>8</li>
            <li class="last">9</li>
          </ul>
        </div>
        <div id="actions" class="button-3 deactive">
          <ul>
            <li href="" class="call">Call</li>
            <li href="" class="skip">Skip</li>
            <li href="" class="clear">Clear</li>
          </ul>
        </div>
      </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/button-action.js"></script>
  </body>
</html>