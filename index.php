<!DOCTYPE html>
<html>
    <header>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, maximum-scale=0.7, minimum-scale=0.6">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <style>
            .pag-active {
                pointer-events: none;
                opacity: 0.7;
            }
            .sort {
                cursor: pointer;
            }
            .sort-asc::after {
                content: '';
                background: url('/assets/arrow_bottom.svg');
                background-size: cover;

                position: absolute;
                right: 10px;
                top: calc(50% - 10px);

                display: block;
                width: 20px;
                height: 20px;
            }
            .sort-desc::after {
                content: '';
                background: url('/assets/arrow_top.svg');
                background-size: cover;
                
                position: absolute;
                right: 10px;
                top: calc(50% - 10px);

                display: block;
                width: 20px;
                height: 20px;
            }
        </style>
    </header>
    <body>
        <?php  @include(__DIR__.'/controller.php'); ?>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <script src="/script_controller.js?<?php echo time();?>" type="text/javascript"></script>
    </body>
</html>
