<html>
<body>
<select name="scene" form="form1">
  <option value="Level1">Level1</option>
  <option value="Level2">Level2</option>
  <option value="Level3">Level3</option>
  <option value="Level4">Level4</option>
<option value="Level5">Level5</option>
</select>
<select name="los" form="form1">
  <option value="A : &lt;= 0.27 people per unit square">A</option>
  <option value="B :0.31 to 0.43 people per unit square">B</option>
  <option value="C :0.43 to 0.72 people per unit square">C</option>
  <option value="D :0.72 to 1.08 people per unit square">D</option>
<option value="E :1.08 to 2.17 people per unit square">E</option>
<option value="F :&gt;2.17 people per unit square">F</option>
</select>
<select name="loa" form="form1">
  <option value="Low">Low</option>
  <option value="Medium">Medium</option>
  <option value="High">High</option>
</select>
<select name="homo" form="form1">
  <option value="Low">Low</option>
  <option value="Medium">Medium</option>
  <option value="High">High</option>
</select>
<form action="http://spanky.rutgers.edu/crowdevacgame/multilogs.php" method="post" id="form1">
<input type="submit" name="submit1" value="Generate"/>
</form>
</body>
</html>