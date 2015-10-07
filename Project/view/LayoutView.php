<?php


class LayoutView {
  
  public function render($isLoggedIn,$doesuserwanttoreg, $v, DateTimeView $dtv) {
    echo '<!DOCTYPE html>
      <html>
        <head>
          <meta charset="utf-8">
          <title>Login Example</title>
        </head>
        <body>
          <h1>Assignment 2</h1>
          ' . $this->renderhref($doesuserwanttoreg) . '
          ' . $this->renderIsLoggedIn($isLoggedIn) . '
          
          <div class="container">
              ' . $v->response() . '
              
              ' . $dtv->show() . '
          </div>
         </body>
      </html>
    ';
  }
  
  private function renderIsLoggedIn($isLoggedIn) {
    if ($isLoggedIn) {
      return '<h2>Logged in</h2>';
    }
    else {
      return '<h2>Not logged in</h2>';
    }
  }
  
  public function renderhref($doesuserwanttoreg) //TODO
  {
    if($doesuserwanttoreg) //TODO stuff
    {
      return "<a href='?'>Back to Login</a>";
    }
    else
    {
      return "<a href='?Register'"."'>Register a new user</a>";
    }
  }
}
