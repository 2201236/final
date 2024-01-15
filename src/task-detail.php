<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Title Here</title>
    <link rel="stylesheet" href="style.scss"> 
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

<div class="progress-pie-chart" data-percent="43">
  <div class="ppc-progress">
    <div class="ppc-progress-fill"></div>
  </div>
  <div class="ppc-percents">
    <div class="pcc-percents-wrapper">
      <span>%</span>
    </div>
  </div>
</div>
<script>
    $(function(){
        var $ppc = $('.progress-pie-chart'),
            percent = parseInt($ppc.data('percent')),
            deg = 360 * percent / 100;
        if (percent > 50) {
            $ppc.addClass('gt-50');
        }
        $('.ppc-progress-fill').css('transform', 'rotate(' + deg + 'deg)');
        $('.ppc-percents span').html(percent + '%');
    });
</script>
</body>
</html>