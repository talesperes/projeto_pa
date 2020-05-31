<?php if (!defined('BASEPATH')) {
   exit('No direct script access allowed');
}

if (!function_exists('text_filter')) {

   function text_filter($request)
   {
      $text = '';

      if (!empty($request)) {

         $text .= '<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" style="text-decoration: none; color: #000;" class="filter">
                     Filtros &nbsp;
                     <span class="chevron_toggleable fa fa-chevron-down">
                     </span>
                   </a>';
      } else {

         $text .= '<span>Filtros &nbsp;</span>';

      }

      echo $text;

   }

}

if (!function_exists('collpase_filter')) {

   function collpase_filter($request)
   {
      $text = '';

      if (!empty($request)) {

         $text .= '';
      } else {

         $text .= 'in';

      }

      echo $text;

   }

}

if (!function_exists('union_array_by_key')) {

   function union_array_by_key($array, $date = false)
   {
      $new_array = array();

      if (!empty($array)) {

         foreach ($array as $key_array => $value_array) {
            foreach ($value_array as $key => $value) {

               if ($date) {
                  $new_array[$key][] = format_datetime($value, 'DATE', 'y');
               } else {
                  $new_array[$key][] = $value;
               }

            }
         }

      }

      return $new_array;

   }

}

if (!function_exists('get_interval_date')) {

   function get_interval_date($start, $end, $format)
   {

      $interval = array();

      if ($format != 'H') {
         $timestamp_inicio = DateTime::createFromFormat('!d/m/y', $start)->getTimestamp();
         $timestamp_fim    = DateTime::createFromFormat('!d/m/y', $end)->getTimestamp();
      }

      if ($format == 'M') {

         while ($timestamp_inicio <= $timestamp_fim) {

            $interval[]       = pega_mes(date('F', $timestamp_inicio));
            $timestamp_inicio = strtotime(date('Y-m-d', $timestamp_inicio) . ' +1 month');

         }

      } elseif ($format == 'D') {

         while ($timestamp_inicio <= $timestamp_fim) {

            $interval[]       = date('d/m/y', $timestamp_inicio);
            $timestamp_inicio = strtotime(date('Y-m-d', $timestamp_inicio) . ' +1 day');

         }

      } elseif ($format == 'H') {

         $timestamp_inicio = DateTime::createFromFormat('!H:i', $start)->getTimestamp();
         $timestamp_fim    = DateTime::createFromFormat('!H:i', $end)->getTimestamp();

         while ($timestamp_inicio <= $timestamp_fim) {
            $interval[]       = date("H:i", $timestamp_inicio);
            $timestamp_inicio = strtotime('+1 hour', $timestamp_inicio);
         }

      }

      return array_reverse($interval);

   }

}

if (!function_exists('nome_tipo')) {
   function nome_tipo($tipo)
   {
      switch ($tipo) {
         case 'RAMAL':$nome = 'Internas';
            break;
         case 'TAX':$nome = 'Taxa';
            break;
         case 'CEL':$nome = 'Celular';
            break;
         case 'COBRA':$nome = 'Cobrar';
            break;
         case 'LOCAL':$nome = 'Local';
            break;
         case 'SERV':$nome = 'Servico';
            break;
         case 'ENT':$nome = 'Recebidas';
            break;
         case 'DDD':$nome = 'DDD';
            break;
         case 'GRAT':$nome = 'Gratuita';
            break;
         case 'DDI':$nome = 'DDI';
            break;
         case 'NA':$nome = 'Não Atendida';
            break;
         case 'NAO ATEND.':$nome = 'Não Atendida';
            break;
         case 'REALIZADA':$nome = 'Realizadas';
            break;
         case 'RECEBIDA':$nome = 'Recebidas';
            break;
         case 'RECEBIDAS':$nome = 'Recebidas';
            break;
         case 'LT':$nome = 'Transferidas';
            break;
         default:$nome = $tipo;
            break;
      }

      return $nome;
   }
}

if (!function_exists('cores_tipo')) {
   function cores_tipo($tipo, $get_nome_tipo = false)
   {
      if ($get_nome_tipo) {
         $tipo = nome_tipo($tipo);
      }

      switch ($tipo) {
         case 'Realizadas':$cor = '#001f3f';
            break;
         case 'Internas':$cor = '#ef7b47';
            break;
         case 'Taxa':$cor = '#795548';
            break;
         case 'Celular':$cor = '#43a047';
            break;
         case 'Cobrar':$cor = '#9B9B9B';
            break;
         case 'Local':$cor = '#f8cb00';
            break;
         case 'Servico':$cor = '#95c2db';
            break;
         case 'Recebidas':$cor = '#20a8d8';
            break;
         case 'DDD':$cor = '#605ca8';
            break;
         case 'Gratuita':$cor = '#008787';
            break;
         case 'DDI':$cor = '#E94189';
            break;
         case 'Não Atendida':$cor = '#ef5350';
            break;
         case 'Transferidas':$cor = '#FFCE00';
            break;
         case 'Falha':$cor = '#FF0000';
            break;
         case 'Ocupado':$cor = '#90ED7D';
            break;
         case 'Nao Atend':$cor = '#ef5350';
            break;
         case 'Nao Atendida':$cor = '#f86c6b';
            break;
         case 'Lig Transf':$cor = '#FFCE00';
            break;
         case 'Lig. Trans.':$cor = '#FFCE00';
            break;
         case 'Ligacao Transferida':$cor = '#FFCE00';
            break;
         case 'Transf':$cor = '#FFCE00';
            break;
         case 'Atendida':$cor = '#4B0082';
            break;
         case 'Lig.Normal':$cor = '#20a8d8';
            break;
         case 'VC1':$cor = '#A5D6A7';
            break;
         case 'VC2':$cor = '#81C784';
            break;
         case 'VC3':$cor = '#66BB6A';
            break;
         case 'ACB':$cor = '#204B75';
            break;
         case 'DSL':$cor = '#505FAE';
            break;
         case 'EVT':$cor = '#D86627';
            break;
         case 'LLC':$cor = '#398EC0';
            break;
         case 'TZ':$cor = '#29a5a5';
            break;
         case 'FIXO-DDD':$cor = '#55a9dc';
            break;
         case 'FIXO_DDI':$cor = '#f8cb00';
            break;
         case 'FIXO-LOCAL':$cor = '#6cc080';
            break;
         case 'MOVEL-DDD':$cor = '#e6645c';
            break;
         case 'MOVEL_DDI':$cor = '#f8cb00';
            break;
         case 'MOVEL-LOCAL':$cor = '#886db3';
            break;
         case 'MOVEL':$cor = '#e6645c';
            break;
         case 'OUTROS':$cor = '#001a35';
            break;
         case 'Ramais':$cor = '#ff723f';
            break;
         case 'Contas':$cor = '#ffa528';
            break;
         default:$cor = null;
            break;
      }

      return $cor;

   }
}

if (!function_exists('order_my_way')) {
   function order_my_way($array, $sort)
   {

      $properOrderedArray = array_replace(array_flip($sort), $array);

      return $properOrderedArray;

   }
}

if (!function_exists('array_value_recursive')) {
   function array_value_recursive($key, array $arr)
   {
      $val = array();
      array_walk_recursive($arr, function ($v, $k) use ($key, &$val) {
         if ($k == $key) {
            array_push($val, $v);
         }

      });
      return count($val) > 1 ? $val : array_pop($val);
   }
}

if (!function_exists('cmp')) {
   function cmp($a, $b)
   {
      return $a['TOTAL'] < $b['TOTAL'];
   }
}

if (!function_exists('cmpString')) {
   function cmpString($a, $b)
   {
      return $a['name'] > $b['name'];
   }
}

if (!function_exists('sec_to_time')) {
   function sec_to_time($seconds)
   {

      $hours = floor($seconds / 3600);
      $seconds -= $hours * 3600;
      $minutes = floor($seconds / 60);
      $seconds -= $minutes * 60;

      $seconds = (strlen($seconds) == 1 ? '0' . $seconds : $seconds);
      $minutes = (strlen($minutes) == 1 ? '0' . $minutes : $minutes);
      $hours   = (strlen($hours) == 1 ? '0' . $hours : $hours);

      $result = $hours . ":" . $minutes . ":" . $seconds;
      return $result;

   }
}

if (!function_exists('time_to_sec')) {
   function time_to_sec($time)
   {

      $hours   = substr($time, 0, -6);
      $minutes = substr($time, -5, 2);
      $seconds = substr($time, -2);

      return $hours * 3600 + $minutes * 60 + $seconds;

   }
}

if (!function_exists('format_datetime')) {
   function format_datetime($datetime, $type, $typeYear = 'Y')
   {
      if (!empty($datetime)) {

         $datetimeReplace = str_replace('/', '-', $datetime);
         $testDate        = explode('-', $datetimeReplace);

         $timeZoneString = 'America/Sao_Paulo';
         $timeZone       = new DateTimeZone($timeZoneString);

         if ($type == 'HOUR' && is_numeric($datetime)) {
            $datetime = sec_to_time($datetime);
         } elseif ($type == 'HOUR') {
            $datetime = date('H:i:s', strtotime($datetimeReplace));
         } elseif ($type == 'DATE') {

            if (($dateFormat = DateTime::createFromFormat('d/m/y', $datetime, $timeZone)) !== false) {
               $datetime = $dateFormat->format("d/m/$typeYear");
            } elseif (($dateFormat = DateTime::createFromFormat('Y-m-d H:i:s', $datetime, $timeZone)) !== false) {
               $datetime = $dateFormat->format("d/m/$typeYear");
            } elseif (($dateFormat = DateTime::createFromFormat('Y-m-d', $datetime, $timeZone)) !== false) {
               $datetime = $dateFormat->format("d/m/$typeYear");
            } else {
               $datetime = $datetime;
            }

         } elseif ($type == 'DAY_WEEK') {
            $datetime = date('w', strtotime($datetimeReplace));
         }

      }

      return $datetime;
   }
}

if (!function_exists('number_to_money')) {
   function number_to_money($number = 0, $decimals = 4)
   {

      $source  = array('.', ',');
      $replace = array('', '.');
      $number  = (float) str_replace($source, $replace, $number);

      return number_format($number, $decimals, ',', '.');

   }
}

if (!function_exists('pegaDDD')) {
   function pegaDDD($string)
   {
      preg_match_all('!\d+!', $string, $matches);
      $ddd = str_replace(array('(', ')'), '', $matches[0][0]);

      if (!empty($ddd)) {
         return $ddd;
      } else {
         return '-';
      }
   }
}

if (!function_exists('escape_like')) {
   function escape_like($string)
   {

      if (is_string($string)) {
         $string = "'%" . strtoupper($string) . "%'";
      }

      return $string;

   }
}

if (!function_exists('present_url')) {
   function present_url()
   {
      $CI  = &get_instance();
      $url = $CI->config->site_url($CI->uri->uri_string());
      return $_SERVER['QUERY_STRING'] ? $url . '?' . $_SERVER['QUERY_STRING'] : $url;
   }
}

if (!function_exists('active_menu')) {
   function active_menu($menu = false, $page)
   {

      if ($menu) {
         $pages = array();
         $page  = str_replace("_", "-", $page);

         $pages['Dashboard'] = array('dashboard');
         $pages['Consultas'] = array('atestar-ligacoes', 'ligacoes-detalhadas', 'ligacoes-resumidas',
            'relatorio-estatistico', 'resumo-conciliacao', 'gestao-telefonica', 'gestao-custos', 'relatorio-tronco', 'relatorio-centro-custo', 'centro-custo-detalhado', 'centro-custo-resumido');
         $pages['Agenda']           = array('agenda');
         $pages['Cadastros']        = array('centrocusto', 'codigoconta', 'departamento', 'importacao-conta', 'operador', 'operadoras', 'ramal', 'tronco');
         $pages['Verificar Ramais'] = array('inicio');
         $pages['Slide']            = array('slide');

         if (in_array($page, $pages[$menu])) {
            echo "active";
         }

      }
   }
}

if (!function_exists('cortaString')) {
   function cortaString($input, $lenght, $slice)
   {
      $start = substr($input, $lenght);
      $end   = substr($start, 0, $slice);

      return $end;
   }
}

if (!function_exists('formatoData')) {
   function formatoData($string, $formato = 'BR')
   {
      $data = substr_replace($string, '/', 4, 0);
      $data = substr_replace($data, '/', 7, 0);

      if ($formato == 'BR') {
         return date('d/m/Y', strtotime($data));
      } else {
         return date('m/d/Y', strtotime($data));
      }

      return $data;
   }
}

if (!function_exists('formatoHora')) {
   function formatoHora($string, $formato = 'BR')
   {
      if ($string != '' || !empty(trim($string))) {
         return implode(':', str_split($string, 2));
      } else {
         return '00:00:00';
      }
   }
}

if (!function_exists('formatoDuracao')) {
   function formatoDuracao($string)
   {
      if (!empty($string)) {
         $duracao = substr_replace(ltrim($string, 0), '.', -1, 0);
         if ($duracao{0} == '.') {
            return '0' . $duracao;
         } else {
            return $duracao;
         }
      } else {
         return null;
      }

   }
}

if (!function_exists('formatoValor')) {
   function formatoValor($string)
   {
      $string = floatval($string);

      if (!empty(trim($string))) {
         if ($string{0} != '.') {
            return $string;
         } elseif ($string < 1) {
            return 0;
         } else {
            return substr_replace(ltrim($string, 0), '.', -2, 0);
         }
      } else {
         return 0;
      }
   }
}

if (!function_exists('verifica_mes')) {
   function verifica_mes($vigencia_inicio, $vigencia_fim, $data_inicio, $data_fim)
   {
      $vigencia_inicio = str_replace('/', '-', $vigencia_inicio);
      $vigencia_fim    = str_replace('/', '-', $vigencia_fim);
      $vigencia_inicio = strtotime(date('Y-m-d', strtotime($vigencia_inicio)));
      $vigencia_fim    = strtotime(date('Y-m-d', strtotime($vigencia_fim)));

      $inicio = str_replace('/', '-', $data_inicio);
      $fim    = str_replace('/', '-', $data_fim);
      $inicio = strtotime(date('Y-m-d', strtotime($inicio)));
      $fim    = strtotime(date('Y-m-d', strtotime($fim)));

      if (($vigencia_inicio >= $inicio) && ($vigencia_inicio <= $fim)) {

         if (($vigencia_fim >= $inicio) && ($vigencia_fim <= $fim)) {
            return true;
         } else {
            return false;
         }

      } else {
         return false;
      }

   }
}

if (!function_exists('getAllDays')) {
   function getAllDays($start, $end)
   {

      $timestamp_inicio = DateTime::createFromFormat('!d/m/y', $start)->getTimestamp();
      $timestamp_fim    = DateTime::createFromFormat('!d/m/y', $end)->getTimestamp();

      $diferenca = $timestamp_fim - $timestamp_inicio;
      $dias      = (int) floor($diferenca / (60 * 60 * 24));

      return $dias;

   }
}

if (!function_exists('pega_mes')) {
   function pega_mes($mes) // Pega mes

   {

      switch ($mes) {
         case 'January':$mes_br = "Janeiro";
            break;
         case 'February':$mes_br = "Fevereiro";
            break;
         case 'March':$mes_br = "Março";
            break;
         case 'April':$mes_br = "Abril";
            break;
         case 'May':$mes_br = "Maio";
            break;
         case 'June':$mes_br = "Junho";
            break;
         case 'July':$mes_br = "Julho";
            break;
         case 'August':$mes_br = "Agosto";
            break;
         case 'September':$mes_br = "Setembro";
            break;
         case 'October':$mes_br = "Outubro";
            break;
         case 'November':$mes_br = "Novembro";
            break;
         case 'December':$mes_br = "Dezembro";
            break;
      }

      return $mes_br;

   }
}

if (!function_exists('verifica_acesso')) {
   function verifica_acesso($usuario, $tela, $action, $expulsa = false)
   {
      if ($action == 'index') {
         $acesso = 'AO_CONSULTA';
      } elseif ($action == 'add') {
         $acesso = 'AO_INSERE';
      } elseif ($action == 'edit') {
         $acesso = 'AO_ALTERA';
      } elseif ($action == 'delete') {
         $acesso = 'AO_EXCLUI';
      } else {
         $acesso = false;
      }

      if ($usuario['AO_SUPERVISOR'] == 'N' && $acesso) {
         if (is_array($tela)) {
            return (array_intersect($usuario['ACEPRO'], $tela) > 0);
         }

         $key = @array_search($tela, $usuario['ACEPRO']);
         if ($key || $key === 0) {
            if (@$usuario[$acesso][$key] == 'S') {
               return true;
            }
         }

         if ($expulsa) {
            show_error('Você não tem autorização para acessar esta página. Entre em contato com o administrador. <br /><br />
                     <a href="javascript:history.back()" style="text-decoration:none;"> Voltar para página anterior. </a> ', 403, 'Erro de Acesso');
            exit();
         } else {
            return false;
         }
      } else {
         return true;
      }
   }
}

if (!function_exists('encrypt_string')) {
   function encrypt_string($pure_string)
   {
      $ci               = get_instance();
      $encryption_key   = $ci->config->config['encryption_key'];
      $encryption_bytes = $ci->config->config['encryption_bytes'];
      $iv               = hex2bin($encryption_bytes);

      $encrypted_string = openssl_encrypt($pure_string, 'AES-128-OFB', $encryption_key, 0, $iv);
      return $encrypted_string;
   }

}

if (!function_exists('decrypt_string')) {
   function decrypt_string($encrypted_string)
   {
      $ci               = get_instance();
      $encryption_key   = $ci->config->config['encryption_key'];
      $encryption_bytes = $ci->config->config['encryption_bytes'];
      $iv               = hex2bin($encryption_bytes);

      $decrypted_string = openssl_decrypt($encrypted_string, 'AES-128-OFB', $encryption_key, 0, $iv);
      return $decrypted_string;
   }

}

if (!function_exists('geraPorcentagem')) {
   function geraPorcentagem($porcentagem, $total)
   {
      $result = @round(($porcentagem * 100) / $total, 2);

      if (@is_nan($result) || $result == 'NAN') {
         return '0%';
      } else {
         return $result . '%';
      }

   }
}

if (!function_exists('format_round')) {
   function format_round($value, $number = 2)
   {
      if (is_infinite($value)) {
         return round(0, $number);
      } elseif (is_nan($value)) {
         return round(0, $number);
      } else {
         return round($value, $number);
      }

   }
}

if (!function_exists('porcentagem_nx')) {
   function porcentagem_nx($parcial, $total, $key = null)
   {

      if (is_array($total)) {

         $soma = 0;

         foreach ($total as $t) {
            $soma += CommaToDot($t[$key]);
         }

         $total = $soma;

      }

      return @format_round(($parcial * 100) / $total, 2);
   }
}

if (!function_exists('is_connected')) {
   function is_connected()
   {
      $connected = @fsockopen("www.google.com", 80);
      if ($connected) {
         $is_conn = true; //action when connected
         fclose($connected);
      } else {
         $is_conn = false; //action in connection failure
      }
      return $is_conn;

   }
}

if (!function_exists('get_mac_address')) {
   function get_mac_address()
   {
      if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
         return substr(exec('getmac'), 0, 17);
      } else {
         exec('netstat -ie', $result);
         if (is_array($result)) {
            $iface = array();
            foreach ($result as $key => $line) {
               if ($key > 0) {
                  $tmp = str_replace(" ", "", substr($line, 0, 10));
                  if ($tmp != "") {
                     $macpos = strpos($line, "HWaddr");
                     if ($macpos !== false) {
                        $iface[] = array('iface' => $tmp, 'mac' => str_replace(':', '-', strtolower(substr($line, $macpos + 7, 17))));
                     }
                  }
               }
            }
            return $iface[0]['mac'];
         } else {
            return "notfound";
         }
      }

   }
}

if (!function_exists('get_php_version')) {
   function get_php_version()
   {
      $php = preg_match("#^\d+(\.\d+)*#", PHP_VERSION, $match);
      return $match[0];
   }
}

if (!function_exists('CommaToDot')) {
   function CommaToDot($value = '')
   {
      $newValue = str_replace(',', '.', $value);
      return $newValue;
   }

}

if (!function_exists('sec_to_min')) {
   function sec_to_min($time, $comma = false)
   {

      $minutes = @floatval(number_format($time / 60, 2, '.', ''));

      if ($comma) {
         $minutes = str_replace('.', ',', $minutes);
      }

      return $minutes;

   }
}

if (!function_exists('Mask')) {
   function Mask($mask, $str)
   {

      $str = str_replace(" ", "", $str);

      for ($i = 0; $i < strlen($str); $i++) {
         $mask[strpos($mask, "#")] = $str[$i];
      }

      return $mask;

   }
}

if (!function_exists('create_slug')) {
   function create_slug($text)
   {
      // replace non letter or digits by -
      $text = preg_replace('~[^\pL\d]+~u', '-', $text);

      // transliterate
      $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

      // remove unwanted characters
      $text = preg_replace('~[^-\w]+~', '', $text);

      // trim
      $text = trim($text, '-');

      // remove duplicate -
      $text = preg_replace('~-+~', '-', $text);

      // lowercase
      $text = strtolower($text);

      if (empty($text)) {
         return 'n-a';
      }

      return $text;
   }
}

if (!function_exists('somaTotal')) {
   function somaTotal(&$total, $valor)
   {
      $total += $valor;
      return $total;
   }
}

if (!function_exists('str_format')) {
   function str_format($str)
   {
      return (!empty($str) ? upperfirst($str) : '-');
   }
}

if (!function_exists('valid_email')) {
   function valid_email($str)
   {
      return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? false : true;
   }
}
