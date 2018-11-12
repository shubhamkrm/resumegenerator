\section{<?=$section->get_title()?>}
\begin{tabular}{rl}
<?php foreach($section->get_all_data() as $item):?>
<?=$item['time']?> & <?=$item['desc']?>\\
<?php endforeach; ?>
\end{tabular}
