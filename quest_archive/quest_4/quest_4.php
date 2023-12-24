<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>関数を自作し使うことができるか？</title>
</head>

<body>
  <p><?php
      function hello()
      {
        echo '"Hello World"';
      }

      hello();
      ?>
  </p>

  <p>
    <?php
    function greeting($name)
    {
      echo "おはよう、{$name}くん";
    }

    greeting('渡辺');
    ?>
  </p>



</body>

</html>
