\section{<?=$section->get_title()?>}
\begin{tabu}{X[l] X[l]}

<?php foreach ($section->get_all_data() as $k => $v) :?>
$\bullet$ \hspace{0.2cm} <?=$v?>
<?php if ($k % 2 == 0): ?>
 &
<?php else: ?>
 \\
<?php endif; ?>
<?php endforeach; ?>

\end{tabu}
