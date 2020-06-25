<?php 

function formValidation_message()
{
	$ci =& get_instance();
	$ci->form_validation->set_message([
		'min_length' => '{field} Minimal {param} karakter.',
		'max_length' => '{field} Maksimal {param} karakter.',
		'required'   => '{field} harus diisi.',
		'matches'    => '%s tidak sama.',
		'is_unique'  => '%s tidak tersedia',
		'valid_email'  => '%s tidak valid',
	]);
	$ci->form_validation->set_error_delimiters('<small class="text-danger">','</small>');
}