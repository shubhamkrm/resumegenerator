\section{Work Experience}
\begin{tabular}{r|p{11cm}}
<?php foreach($section->get_all_data() as $work): ?>
\textsc{<?=$work['time']?>} & <?=$work['designation']?> at
\textsc{<?=$work['organisation']?>} \\&\footnotesize{<?=$work['desc']?>}\\\multicolumn{2}{c}{} \\
<?php endforeach; ?>
\end{tabular}
