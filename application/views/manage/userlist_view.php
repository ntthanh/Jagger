<?php
$form = '<form id="filter-form"><input name="filter" id="filter" value="" maxlength="30" size="30" type="text" placeholder="' . lang('rr_filter') . '"></form>';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

echo '<div class="medium-3 column">' . $form . '</div>';
echo '<div class="medium-3 medium-offset-6 column end text-right"><a dhref="' . base_url('manage/users/add') . '" class="button " data-open="newusermodal">' . lang('btn_newuser') . '</a></div>';
$tmpl = array('table_open' => '<table  id="details" class="userlist filterlist">');

$this->table->set_template($tmpl);
$this->table->set_empty("&nbsp;");
$this->table->set_heading('' . lang('rr_username') . '', '' . lang('rr_userfullname') . '', '' . lang('rr_uemail') . '',lang('srole'), '' . lang('lastlogin') . '',  lang('rr_action'));
echo '<div class="small-12 column">';
echo $this->table->generate($userlist);
echo '</div>';
$this->table->clear();

echo '<div id="newusermodal" class="reveal small" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">';
echo '<h4 id="modalTitle">' . lang('rr_newuserform') . '</h4>';
$this->load->view('manage/new_user_view');
echo '<a class="close-button" aria-label="Close" data-close>&#215;</a>
</div>';


echo '<div id="removeusermodal" class="reveal small" data-reveal>';
$form_attributes = array('id' => 'formver2', 'class' => 'register');


$f = form_open(base_url('manage/users/remove'), $form_attributes);
$f .= '<h4>'.lang('rr_rmuserconfirm').' : <span id="usernameval"></span></h4>';
$f .= '<div id="removeusermodalmsg"  data-alert class="alert-box hidden"></div>';
$f .= '<div class="small-12 column"><div class="small-3 column">';
$f .= '<input type="hidden" style="display:none;" value="" name="encodedusr" id="encodedusr">';
$f .= jform_label('' . lang('rr_username') . '', 'username') . '</div>';
$f .= '<div class="small-6 large-7 end column">' . form_input('username') . '</div></div>';
$f .= '<div class="buttons small-12 columns">';
$mbts = array(
    '<button type="reset" name="cancel" value="cancel" class="button alert" data-close >'.lang('rr_cancel').'</button>',
    '<button type="submit" name="remove" value="remove" class="button resetbutton deleteicon">' . lang('rr_rmuserbtn') . '</button>',
    '<button type="reset" name="close" value="cancel" class="button hidden" data-close>Close</button>',
);
$f .= revealBtnsRow($mbts);
$f .='</div>' . form_close();
echo $f;

echo '<button class="close-button" data-close aria-label="Close Accessible Modal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>';

echo '</div>';

