<?php
  require "menu.inc";
  displayHeader("");

  function get_news() {
      $filehandle = fopen ("http://sourceforge.net/export/projnews.php?group_id=36391&limit=5&flat=1&show_summaries=1", "r");
      if (!$filehandle) {
	  return "Unable to open remote file.";
      } else {
	  $filecontents = '';
	  while (!feof ($filehandle)) {
	      $filecontents .= fgets ($filehandle, 1024);
	  }
	  fclose ($filehandle);
      }

      $filecontents = preg_replace('|<I>[^<]*</I>[^<]*<A HREF="http://sourceforge.net/projects/snowball/">Snowball</A>|', '', $filecontents);
      $filecontents = preg_replace('|<div align="center">.*?</div>|', '', $filecontents);

      return $filecontents;
  }
?>
<p>

Snowball is a language for describing stemming algorithms, primarily for
information retrieval.  Snowball scripts are converted to ANSI C code, which is
then compiled to produce an extremely efficient stemming routine, capable of
stemming upwards of one million words per second on a modern machine (eg, 1 GHz
Pentium III).

</p><p>

Snowball scripts exist for performing stemming a number of European languages,
together with equivalent C programs, stemmer definitions and sample
vocabularies.

</p><p>

Snowball is released as free software under the BSD license, in the hope that
it will be used in as wide a variety of situations as possible.  Developers are
strongly encouraged to submit any and all comments, problem reports and
improvements.

</p>
<h2>Recent News</h2>
<p>
<?php
  echo get_news();
?>
</p><p>
<a href="news.php">Full stories</a>
</p>
<?php displayFooter(); ?>
