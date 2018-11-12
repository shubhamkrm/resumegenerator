\documentclass[a4paper,10pt]{article}

\usepackage[a4paper]{geometry}
\usepackage{marvosym}
\usepackage{fontspec}
\usepackage{xunicode,xltxtra,url,parskip}
\RequirePackage{color,graphicx}
\usepackage[usenames,dvipsnames]{xcolor}
\usepackage{titlesec}
\usepackage{tabu}

\geometry{
top=1in,
bottom=0cm}

\usepackage{hyperref}
\definecolor{linkcolour}{rgb}{0,0.2,0.6}
\hypersetup{colorlinks,breaklinks,urlcolor=linkcolour, linkcolor=linkcolour}

\defaultfontfeatures{Mapping=tex-text}
\setmainfont[ Path = templates/plasmatti/fonts/,
SmallCapsFont = Fontin-SmallCaps,
BoldFont = Fontin-Bold,
ItalicFont = Fontin-Italic
]
{Fontin}

\titleformat{\section}{\Large\scshape\raggedright}{}{0em}{}[\titlerule]
\titlespacing{\section}{0pt}{3pt}{3pt}
\addtolength{\voffset}{-1.3cm}

\hyphenation{im-pre-se}

\usepackage[absolute]{textpos}

\setlength{\TPHorizModule}{30mm}
\setlength{\TPVertModule}{\TPHorizModule}
\textblockorigin{2mm}{0.65\paperheight}
\setlength{\parindent}{0pt}

\begin{document}

\pagestyle{empty}

\font\fb=''[cmr10]''

<?=$section->get('body')?>
\end{document}
