<?php
/**
 * @name        CodeIgniter Advanced Images
 * @author      Jens Segers
 * @link        http://www.jenssegers.be
 * @license     MIT License Copyright (c) 2012 Jens Segers
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

/**
 * Image
 *
 * Generates a modified image source to work with the advanced images controller
 *
 * @access  public
 * @param   mixed
 * @return  string
 */
if (!function_exists('image')) {
    function image($image_path, $preset) {
        $ci = &get_instance();
        
        // load the allowed image presets
        $ci->load->config("images");
        $sizes = $ci->config->item("image_sizes");
        
        $pathinfo = pathinfo($image_path);
        $new_path = $image_path;
        
        // check if requested preset exists
        if (isset($sizes[$preset])) {
            $new_path = $pathinfo["dirname"] . "/" . $pathinfo["filename"] . "-" . implode("x", $sizes[$preset]) . "." . $pathinfo["extension"];
        }
        
        return $new_path;
    }
}

// upload image
if (!function_exists('image_upload')) {
    function image_upload($image_path, $image_name)
    {
        $ci = &get_instance();
        $config = array(
            'upload_path'   => $image_path,
            'allowed_types' => 'gif|jpg|jpeg|png|GIF|JPG|JPEG|PNG',
            'max_size'      => 2000,
            'encrypt_name'  => true
        );
        $ci->load->library('upload', $config);

        if (! $ci->upload->do_upload($image_name)) {
            $ci->session->set_flashdata('error', $sub_data['error'] = $ci->upload->display_errors());
            return false;
        }

        $sub_data = $ci->upload->data();
        foreach ($sub_data as $item => $data) {
            $items = $sub_data['file_name'];
        }
        
        return $items;
    }
}

// upload image
if (!function_exists('image_upload_rename')) {
    function image_upload_rename($image_path, $image_name, $new_name)
    {
        $ci = &get_instance();
        $config = array(
            'upload_path'   => $image_path,
            'allowed_types' => 'png|jpg|jpeg|PNG|JPG|JPEG',
            'max_size'      => 2000,
            'file_name'     => $new_name,
        );
        $ci->load->library('upload', $config);

        if (! $ci->upload->do_upload($image_name)) {
            $ci->session->set_flashdata('error', $sub_data['error'] = $ci->upload->display_errors());
            return false;
        }

        $sub_data = $ci->upload->data();
        foreach ($sub_data as $item => $data) {
            $items = $sub_data['file_name'];
        }
        
        return $items;
    }
}

// delete image
if (! function_exists('image_remove')) {
    function image_remove($image_path, $image_name)
    {
    
    
        $pathinfo = pathinfo($image_path.'/'.$image_name);
        $dirname  = $pathinfo['dirname'];
        $filename = $pathinfo['filename'];
    
    	$files = glob($dirname.'/'.$filename.'*');
	array_walk($files, function ($files) {
		if (file_exists($files)) {
			unlink($files);
		}
	});

        /*foreach (glob($dirname.'/'.$filename.'*') as $filelist) {
            if (file_exists($filelist)) {  
               @unlink($filelist);
            }
        } */
    }
}

// upload file
if (!function_exists('file_upload')) {
    function file_upload($file_path, $file_name)
    {
        $ci = &get_instance();
        $config = array(
            'upload_path'   => 'assets/'.$file_path,
            'allowed_types' => 'txt|pdf|rtf|doc|docx|xls|xlsx|odt|ods|odp|zip|rar|jpg|jpeg|png|JPG|JPEG|PNG',
            'max_size'      => 1000,
            'encrypt_name'  => true
        );
        $ci->load->library('upload', $config);

        if (! $ci->upload->do_upload($file_name)) {
            $ci->session->set_flashdata('error', $sub_data['error'] = $ci->upload->display_errors());
            return false;
        }

        $sub_data = $ci->upload->data();
        foreach ($sub_data as $item => $data) {
            $items = $sub_data['file_name'];
        }
        
        return $items;
    }
}

// delete file
if (! function_exists('file_remove')) {
    function file_remove($file_path, $file_name)
    {
    
    
        $pathinfo = pathinfo('assets/'.$file_path.'/'.$file_name);
        $dirname  = $pathinfo['dirname'];
        $filename = $pathinfo['filename'];
    
        $files = glob($dirname.'/'.$filename.'*');
    array_walk($files, function ($files) {
        if (file_exists($files)) {
            unlink($files);
        }
    });


    }
}

if (! function_exists('file_download')) {
    function file_download($file_path, $file_name) {
        //int readfile ( string $file_name [, bool $use_include_path = false [, resource $context ]] )
        $pathinfo = pathinfo('assets/'.$file_path.'/'.$file_name);
        $dirname  = $pathinfo['dirname'];
        $filename = $pathinfo['filename'];
    
        $files = glob($dirname.'/'.$filename.'*');
        array_walk($files, function ($files) {   
            if (file_exists($files)) {
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename='.basename($files));
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($files));
                readfile($files);
                exit;
            }
        });
    }
}
