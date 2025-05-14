<HTML>
<HEAD>
<SCRIPT type="text/javascript">

  document.addEventListener('DOMContentLoaded', function() {
    const checkTodos = document.getElementById('check_todos');
    const checkboxes = document.querySelectorAll('.check_individual');

    checkTodos.addEventListener('change', function() {
      checkboxes.forEach(function(c) {
        c.checked = checkTodos.checked;
      });
    });
  });
</script>

</HEAD>
<BODY>
<label><input type="checkbox" id="check_todos"> Seleccionar todos</label>
<br>
<label><input type="checkbox" class="check_individual" name="item[]" value="1"> Opción 1</label><br>
<label><input type="checkbox" class="check_individual" name="item[]" value="2"> Opción 2</label><br>
<label><input type="checkbox" class="check_individual" name="item[]" value="3"> Opción 3</label><br>