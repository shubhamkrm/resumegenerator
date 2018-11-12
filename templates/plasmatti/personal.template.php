\par{\centering
	{\Huge <?=$section->get('name')?>
}\bigskip\par}

\section{Personal Data}

\begin{tabular}{rl}
<?php foreach ($section->get_all_data() as $key => $val):?>
	<?php if ($key != 'title' && $key != 'name'):?>
	\textsc{<?=$key?>:}   & <?=$val?>\\
	<?php endif;?>
<?php endforeach;?>
\end{tabular}

