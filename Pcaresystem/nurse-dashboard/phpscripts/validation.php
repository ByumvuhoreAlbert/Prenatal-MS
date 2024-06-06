<?php
$error[];

function validateInput($input, $type, $required = false){
  global $error;

  $validate_input = trim($input);

  if($reuired && empty($validate_input)){
    $error[] = 'Please fill in all required fields.';
    return false;
  }

  switch ($type) {
    case 'text':

      break;

      case 'number':
        // code...
        if(!is_numeric($validate_input)){
          $error [] = 'only numerical data allowed';
          return false;
        }
        break;

        case 'tel':
          // code...
          break;

          case 'variable':
            // code...
            break;
    default:
      // code...
      break;
  }
}

 ?>
