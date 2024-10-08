<?php
 if (!defined('BASEPATH')) exit('No direct script access allowed');
  if (!isset($this->session->userdata['logged_in'])){
     header("location:".  base_url('login'));
 }

?>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/puzzle/style.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/sweet/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/sweet/sweetalert.min.js">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/sweet/themes/facebook/facebook.css">

<p>Carbohydrates</p>
<div id='puzzle'></div>
<div id='words'></div>
<!-- <div><button id='solve'>Solve Puzzle</button></div> -->

    <script src="<?php echo base_url(); ?>assets/sweet/sweetalert-dev.js"></script>
    <script src="<?php echo base_url(); ?>assets/puzzle/ajax.js"></script>
    <script src="<?php echo base_url(); ?>assets/puzzle/wordfind.js"></script>
    <script src="<?php echo base_url(); ?>assets/puzzle/wordfindgame.js"></script>
    
<script>
    
  //$.MessageBox("A plain MessageBox can replace Javascript's window.alert(), and it looks definitely better...");
  var words = [<?php $this->load->model('mdl_help', '', TRUE); foreach ($this->load->mdl_help->get_record("1") as $value) { echo '"'.str_replace(" ","",$value->name).'",'; }?>];
    
  var words_def = [""];
<?php $this->load->model('mdl_help', '', TRUE); foreach ($this->load->mdl_help->get_record("1") as $value) { echo 'words_def["'.str_replace(" ","",$value->name).'"]="'.$value->facts.'";'; }?>

  // start a word find game
  var gamePuzzle = wordfindgame.create(words, '#puzzle', '#words');

  $('#solve').click( function() {
    wordfindgame.solve(gamePuzzle, words);
  });

  // create just a puzzle, without filling in the blanks and print to console
  var puzzle = wordfind.newPuzzle(
    words, 
    {height: 18, width:18, fillBlanks: false}
  );
  wordfind.print(puzzle);
</script>
    