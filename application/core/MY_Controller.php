<?php
defined('BASEPATH') or exit('Sem permissão');

class MY_Controller extends CI_Controller
{

   private $conexao;
   private $empresa;

   public function __construct()
   {
      parent::__construct();
   }

   protected function connectionURL($url)
   {
      if ($url) {

         $this->load->model('Empresa_Model');
         $empresa = $this->Empresa_Model->where("ativo", "S")->as_array()->get(array("url" => $url));

         if (!empty($empresa)) {

            $dbSettings = dbConfig($empresa);

            if ($this->setConnection($dbSettings)) {
               $this->setDriver($empresa['tipo_conexao']);
               $this->setLastAccess($empresa['last_access_api']);
               $this->setEmpresa($empresa);
               return $this->getConnection();
            }

         } else {
            show_error('Conexão não encontrada no banco de dados.', 503, 'Erro - Banco de Dados');
         }

      } else {
         die('Houve um problema ao estabelecer a conexão.');
      }

   }

   protected function connectionEmpresa($id)
   {
      if ($id) {

         $this->load->model('Empresa_Tarifador');
         $empresa = $this->Empresa_Tarifador->as_array()->get(array("ID" => $id));
         $empresa = array_change_key_case($empresa, CASE_UPPER);
         if (!empty($empresa)) {

            $dbSettings = newConfig($empresa);

            if ($this->setConnection($dbSettings)) {
               return $this->getConnection();
            }

         } else {
            show_error('Conexão não encontrada no banco de dados.', 503, 'Erro - Banco de Dados');
         }

      } else {
         die('Houve um problema ao estabelecer a conexão.');
      }

   }

   private function setConnection($connSettings)
   {
      if (empty($connSettings)) {
         return false;
      }

      $this->conexao = $connSettings;
      return true;
   }

   private function getConnection()
   {
      return $this->conexao;
   }

   private function setDriver($driver)
   {
      if (empty($driver)) {
         return false;
      }

      $this->dbDriver = $driver;
      return true;
   }

   protected function getDriver()
   {
      return $this->dbDriver;
   }

   private function setLastAccess($last_access_api)
   {
      if (empty($last_access_api)) {
         return false;
      }

      $this->last_access_api = $last_access_api;
      return true;
   }

   protected function getLastAccess()
   {
      return $this->last_access_api;
   }

   private function setEmpresa($empresa)
   {
      if (empty($empresa)) {
         return false;
      }

      $this->empresa = $empresa;
      return true;
   }

   protected function getEmpresa($column = null)
   {
      if ($column && isset($this->empresa[$column])) {
         return $this->empresa[$column];
      }

      return $this->empresa;
   }

   public function startPagination($url, $total, $per_page, $is_admin = false, $cur_page = null)
   {

      $config                       = array();
      $config["base_url"]           = site_url($url . '/page');
      $config['first_url']          = site_url($url . '/page/1') . (!empty($this->input->get()) ? '?' . http_build_query($this->input->get()) : '');
      $config["total_rows"]         = $total;
      $config["per_page"]           = $per_page;
      $config["uri_segment"]        = ($is_admin === true ? 5 : 4);
      $config['use_page_numbers']   = true;
      $config["reuse_query_string"] = true;

      if (isset($cur_page)) {
         $config["cur_page"] = $cur_page;
      }

      $config['full_tag_open']    = "<ul class='pagination'>";
      $config['full_tag_close']   = "</ul>";
      $config['num_tag_open']     = "<li class='page-item'>";
      $config['num_tag_close']    = '</li>';
      $config['cur_tag_open']     = "<li class='page-item active'><a class='page-link'>";
      $config['cur_tag_close']    = "<span class='sr-only'></span></a></li>";
      $config['next_tag_open']    = "<li>";
      $config['next_tagl_close']  = "</li>";
      $config['next_link']  = "Próximo";
      $config['prev_tag_open']    = "<li>";
      $config['prev_tagl_close']  = "</li>";
      $config['prev_link'] = "Voltar";
      $config['first_tag_open']   = "<li>";
      $config['first_tagl_close'] = "</li>";
      $config['first_link']  = "Primeira";
      $config['last_tag_open']    = "<li>";
      $config['last_tagl_close']  = "</li>";
      $config['last_link']  = "Última";
      $config['attributes'] = array('class' => 'page-link');

      $this->pagination->initialize($config);

      return $config["per_page"];

   }

   protected function escape_value($value = '')
   {

      if (isset($value) && !empty($value)) {
         if (is_array($value)) {
            $value = "'" . implode("','", $value) . "'";
            $value = explode(',', $value);
         } else {
            $value = "'" . $value . "'";
         }

      }

      return $value;
   }

   protected function export_pdf($html = null, $filename = 'relatorio.pdf', $titlePDF = 'Relatório De Ligações Tarifadas', $default_header = true, $html_header = null, $is_landscape = true)
   {

      if (isset($html) && !empty($html)) {

         $snappy_pdf = new \Knp\Snappy\Pdf(PATH_WK, [
            'viewport-size'    => '1280x800',
            'margin-top'       => 35,
            'margin-right'     => 10,
            'margin-bottom'    => 15,
            'margin-left'      => 10,
            'orientation'      => ($is_landscape ? 'Landscape' : 'Portrait'),
            'footer-right'     => '[page] / [toPage]',
            'footer-font-size' => 8,
         ]);

         if ($default_header) {
            $header_pdf = $this->load->view("template/header_pdf", array('title' => $titlePDF), true);
         } else {
            $header_pdf = $html_header;
         }

         $snappy_pdf->setOption('header-html', $header_pdf);
         $snappy_pdf->setOption('title', $filename);

         @unlink('./assets/pdf/' . $filename);

         $snappy_pdf->generateFromHtml($html, './assets/pdf/' . $filename, ['encoding' => 'UTF8']);
         $path = './assets/pdf/' . $filename;

         header('Content-Type: application/pdf');
         header('Content-Disposition: inline; filename=' . $filename);
         header('Expires: 0');
         header('Cache-Control: must-revalidate');
         header('Pragma: public');
         header('Content-Length: ' . filesize($path));
         while (ob_get_level()) {
            ob_end_clean();
         }
         flush();
         @readfile($path);

      } else {
         show_error('Não foi encontrado conteúdo para ser exportado. Tente novamente.', 400, 'Ocorre um erro ao exportar');
      }

   }

   protected function export_pdf_relatorio_ramal($html = null, $filename = 'relatorio.pdf', $titlePDF = 'Relatório De Ligações Tarifadas', $default_header = true, $html_header = null, $is_landscape = true)
   {

      if (isset($html) && !empty($html)) {

         $snappy_pdf = new \Knp\Snappy\Pdf(PATH_WK, [
            'viewport-size'    => '1280x800',
            'margin-top'       => 35,
            'margin-right'     => 5,
            'margin-bottom'    => 15,
            'margin-left'      => 5,
            'orientation'      => ($is_landscape ? 'Landscape' : 'Portrait'),
            'footer-right'     => '[page] / [toPage]',
            'footer-font-size' => 8,
         ]);

         if ($default_header) {
            $header_pdf = $this->load->view("template/header_pdf", array('title' => $titlePDF), true);
         } else {
            $header_pdf = $html_header;
         }

         $snappy_pdf->setOption('header-html', $header_pdf);
         $snappy_pdf->setOption('title', $filename);

         @unlink('./assets/pdf/' . $filename);

         $snappy_pdf->generateFromHtml($html, './assets/pdf/' . $filename, ['encoding' => 'UTF8']);

         $path = './assets/pdf/' . $filename;
         header('Content-Type: application/pdf');
         header('Content-Disposition: inline; filename=' . $filename);
         header('Expires: 0');
         header('Cache-Control: must-revalidate');
         header('Pragma: public');
         header('Content-Length: ' . filesize($path));
         while (ob_get_level()) {
            ob_end_clean();
         }
         flush();
         @readfile($path);
      } else {
         show_error('Não foi encontrado conteúdo para ser exportado. Tente novamente.', 400, 'Ocorre um erro ao exportar');
      }

   }

   protected function export_pdf_test($html = null, $filename = 'relatorio.pdf', $titlePDF = 'Relatório De Ligações Tarifadas', $default_header = true, $html_header = null, $is_landscape = true)
   {

      if (isset($html) && !empty($html)) {

         $snappy_pdf = new \Knp\Snappy\Pdf(PATH_WK, [
            'viewport-size'    => '1280x800',
            'margin-top'       => 30,
            'margin-right'     => 20,
            'margin-left'      => 20,
            'margin-bottom'    => 15,
            'orientation'      => ($is_landscape ? 'Landscape' : 'Portrait'),
            'footer-right'     => '[page]',
            'footer-font-size' => 8,
            'title'            => 'GSCi_' . date('Y') . '.pdf',
         ]);

         if ($default_header) {
            $header_pdf = $this->load->view("template/header_pdf", array('title' => $titlePDF), true);
         } else {
            $header_pdf = $html_header;
         }

         $snappy_pdf->setOption('header-html', $header_pdf);

         @unlink('./assets/pdf/' . $filename);
         $snappy_pdf->generateFromHtml($html, './assets/pdf/' . $filename, ['encoding' => 'UTF8']);

         $path = './assets/pdf/' . $filename;
         header('Content-Type: application/pdf');
         header('Content-Disposition: inline; filename=' . $filename);
         header('Expires: 0');
         header('Cache-Control: must-revalidate');
         header('Pragma: public');
         header('Content-Length: ' . filesize($path));
         while (ob_get_level()) {
            ob_end_clean();
         }
         flush();
         @readfile($path);

      } else {
         show_error('Não foi encontrado conteúdo para ser exportado. Tente novamente.', 400, 'Ocorre um erro ao exportar');
      }

   }

   protected function export_excel($html = null, $filename = 'relatorio.excel')
   {

      if (isset($html) && !empty($html)) {

         header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
         header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
         header("Cache-Control: no-cache, must-revalidate");
         header("Pragma: no-cache");
         header("Content-type: application/x-msexcel");
         header("Content-Disposition: attachment; filename=\"{$filename}\"");
         header("Content-Description: PHP Generated Data");
         echo $html;
         exit();

      } else {
         show_error('Não foi encontrado conteúdo para ser exportado. Tente novamente.', 400, 'Ocorre um erro ao exportar');
      }

   }

   protected function postCURL($_url, $_param, $_method = 'POST')
   {

      $options = array(
         'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => $_method,
            'content' => http_build_query($_param),
         ),
      );

      $context = stream_context_create($options);
      $result  = @file_get_contents($_url, false, $context);

      return json_decode($result);
   }

   public function centro_custo_populate()
   {

      $departamento = (!is_array($this->input->get('departamento')) ? explode(',', $this->input->get('departamento')) : $this->input->get('departamento'));

      if ($departamento[0] != 'null') {

         $empresa       = $this->input->get('empresa');
         $this->conexao = $this->connectionEmpresa($empresa);

         $this->load->model('CentroCusto_Tarifador');
         $centro_custo = $this->CentroCusto_Tarifador->on($this->conexao)->get_custo_departamento($departamento);

         if (!is_array($this->input->get('filtro')) && $this->input->get('filtro') > 0) {
            $filtro = explode(',', $this->input->get('filtro'));
         } else {
            $filtro = $this->input->get('filtro');
         }

         if (!empty($centro_custo)) {
            foreach ($centro_custo as $c) {
               echo "<option value='" . trim($c['CUSCOD']) . "' " . (@in_array(trim($c['CUSCOD']), $filtro) ? 'selected' : null) . "> {$c['CUSDES']} </option>";
            }
         }

      }

   }

   public function ramal_populate()
   {
      $centro_custo = (!is_array($this->input->get('centro_custo')) ? explode(',', $this->input->get('centro_custo')) : $this->input->get('centro_custo'));

      if ($centro_custo[0] != 'null') {

         $empresa       = $this->input->get('empresa');
         $this->conexao = $this->connectionEmpresa($empresa);

         $this->load->model('Ramal_Tarifador');
         $ramal = $this->Ramal_Tarifador->on($this->conexao)->get_ramal_centrocusto($centro_custo);

         if (!is_array($this->input->get('filtro')) && $this->input->get('filtro') > 0) {
            $filtro = explode(',', $this->input->get('filtro'));
         } else {
            $filtro = $this->input->get('filtro');
         }

         if (!empty($ramal)) {
            foreach ($ramal as $r) {
               echo "<option value='{$r['RAMCOD']}' " . (@in_array($r['RAMCOD'], $filtro) ? 'selected' : null) . "> {$r['RAMCOD']} - {$r['RAMDES']} </option>";
            }
         }

      }

   }

   public function conta_populate()
   {
      $centro_custo = (!is_array($this->input->get('centro_custo')) ? explode(',', $this->input->get('centro_custo')) : $this->input->get('centro_custo'));

      if ($centro_custo[0] != 'null') {

         $empresa       = $this->input->get('empresa');
         $this->conexao = $this->connectionEmpresa($empresa);

         $this->load->model('CodigoConta_Tarifador');
         $conta = $this->CodigoConta_Tarifador->on($this->conexao)->get_conta_centrocusto($centro_custo);

         if (!is_array($this->input->get('filtro')) && $this->input->get('filtro') > 0) {
            $filtro = explode(',', $this->input->get('filtro'));
         } else {
            $filtro = $this->input->get('filtro');
         }

         if (!empty($conta)) {
            foreach ($conta as $c) {
               echo "<option value='{$c['CONTACOD']}' " . (@in_array($c['CONTACOD'], $filtro) ? 'selected' : null) . "> {$c['CONTADES']} </option>";
            }
         }

      }

   }

   public function startUpload($dir, $filename = '')
   {
      if (!is_dir($dir)) //create the folder if it's not already exists
      {
         mkdir($dir, 0755, true);
      }

      $config                  = array();
      $config['upload_path']   = $dir;
      $config['allowed_types'] = 'gif|jpg|png|jpeg|';
      $config['max_size']      = 0;
      $config['max_width']     = 0;
      $config['max_height']    = 0;

      if (!empty($filename)) {
         $config['file_name'] = $filename;
      } else {
         $config['encrypt_name'] = true;
      }

      $this->load->library('upload', $config);

      return;
   }

   public function is_mobile()
   {
      $this->load->library('user_agent');

      if ($this->agent->is_mobile()) {
         return true;
      } else {
         return false;
      }

   }

   protected function upload_files_by_keys(array $files, array $keys)
   {
      // if (isset($files) && ! empty($files))
      // {
      foreach ($keys as $key) {
         if ($files['tmp_name'][$key][0] == '') {
            $data[] = array(
               'file_name' => null,
               'ID'        => $key,
            );
            continue;
         }

         $_FILES['file']['name']     = $files['name'][$key][0];
         $_FILES['file']['type']     = $files['type'][$key][0];
         $_FILES['file']['tmp_name'] = $files['tmp_name'][$key][0];
         $_FILES['file']['error']    = $files['error'][$key][0];
         $_FILES['file']['size']     = $files['size'][$key][0];

         if ($this->upload->do_upload('file')) {

            $data[] = array_merge($this->upload->data(), array('ID' => $key));
         } else {
            $this->alert->set('alert-danger', 'Ocorreu um erro ao enviar a imagem.' . $this->upload->display_errors(), true);
            return false;
         }
      }
      return $data;
      // }
   }

}
