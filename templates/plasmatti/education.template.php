\section{Education}
\begin{tabular}{rl}	

<?php foreach($section->get_all_data() as $edu_detail) :?>
<?php extract($edu_detail); ?>
<?=$time?> & \textbf{<?=$degree?>}\\
& <?=$institution?>\\
%&\normalsize \textsc{<?=$percent_key?>}: <?=$percent_val?>\\&\\
&\normalsize \textsc{Percentage}: <?=$percent_val?>\%\\&\\
<?php endforeach; ?>

\end{tabular}
