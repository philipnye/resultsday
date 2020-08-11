# :chart_with_upwards_trend: GCSE and A-Level results day analysis
Code powering GCSE and A-Level results analysis from FFT Education Datalab and the Nuffield Foundation, [as featured on our results microsite](https://results.ffteducationdatalab.org.uk/).

For background to the project, refer to [the _About_ page of the results microsite](https://results.ffteducationdatalab.org.uk/about.php).

## Contents
* `py`: Six Python files, details of which are provided below
* `data`: Data files on which the site is based:
	* `source`: Excel files (`.xls`, `.xlsx`) of entry and grades data for the period published by the [Joint Council for Qualifications](https://www.jcq.org.uk/). Filenames take the form `<level>_<year>_<scope>_<grades (GCSE only)>`. Here `scope` refers to the breakdowns by home nation (`UK`, `EN`, `WA`, `NI`), age of entrant (GCSE only; `15`, `16`, `17`) or home nation and age (GCSE only; `EN16` only). `grades` refers to whether datafiles are in terms of A\*-G grades (`ag`), or the key grades at which the 9-1 grade structure and the A*-G grade structure are pegged (`keygrades`).
	* `output`:
		* `a-level`:
			* `<level>-entries.json`: Compiled entries data produced by `data_compiler.py`, based on the source data files
			* `<level>-grades.json`: Compiled grades data produced by `data_compiler.py`, based on the source data files
			* `<level>-subjects.json`: A bespoke dataset produced by Datalab, giving subject definitions, flags for whether a subject is an English Baccalaureate subject, is double-counted in Progress 8, or is a facilitating subject, reform dates, and contextual information.
			* `<level>-text.json`: A data file written by the `analysis_writer.py` script, it provides analysis of entry numbers and grades for each subject.
		* `as-level`:
			* as per a-level
		* `gcse`:
			* as per a-level
		* `popn`:
			* `popn.json`: A data file used by the `analysis_writer.py` script. The source is ultimately the [ONS's mid-year population estimates](https://www.ons.gov.uk/peoplepopulationandcommunity/populationandmigration/populationestimates/datasets/populationestimatesforukenglandandwalesscotlandandnorthernireland)
* `templates`: template files for subject-level php pages and level sub-pages
* `a-level`, `as-level`, `gcse`: subject-level php pages, generated by `template_copier.py`
* `a-level.php`, `as-level.php`, `gcse.php`: level sub-pages
* `css`, `img`, `inc`, `js`, together with various individual home directory files: web files

Data files are shaped in the format required for use in [Highcharts](https://www.highcharts.com/) charts.

## Python scripts
**subjects_checker**: Checks completeness in both directions between source files and `-subjects.json` files.

**data_compiler**: Compiles `-entries.json` and `-grades.json` files, with data for all subjects in `-subjects.json` files.

**analysis_writer**: Writes analysis to `-text.json` files for all subjects in `-subjects.json` files with at least one year of entry data. Blank for those with none.

**extract_generator**: Generates a number of bespoke data extracts from the `-entries.json` and `-grades.json` files.

**versioning_updater**: Appends a query string to links to `.php`, `.js`, `.json` `.css` project files in all `.php` and `.js` files, so that cached versions of these files aren't loaded once they are updated.

**template_copier**: Produces a `.php` page for each of the three levels (GCSE, A-Level, AS-Level) and each subject in `subjects.json`, based on the template files in the `templates` folder.

## Instructions
1. Bring in and rename any new source data files, following the naming convention `<level>_<year>_<scope>_<grades (GCSE only)>`
1. `subjects_checker.py`
	1. Update script to look at most recent year for which data is available (see line marked `XXX`)
	1. Run
	1. (If required) Update `-subject.json` files
	1. (If required) Re-run
1. Run `data_compiler.py`
1. Run `analysis_writer.py`
	1. Update script to start at the same start year as that used in charts (see line marked `XXX`)
	1. Run
1. (If required) Run `extract_generator.py`
1. `versioning_updater.py`
	1. Run
	1. Check output

`template_copier.py` almost certainly won't need running on results day - it only needs running after design tweaks to subject pages.

## Producing bespoke charts
The microsite has the ability to produce two types of bespoke chart. In both cases, only entries charts can be produced, not grade breakdown charts.

### Subject comparison
This allows comparison of entry trends in multiple subjects.

The URL used is of the form:

* https://results.ffteducationdatalab.org.uk/gcse/bespoke.php?sbj=FREN,SPAN,GERM

Up to seven subjects can be displayed before series colours repeat.

### Country/age comparison
This allows comparison of entry trends in a single subject by the different country and age breakdowns for which we have data.

The URL used is of one of the following forms:

* https://results.ffteducationdatalab.org.uk/gcse/bespoke.php?sbj=FREN|options=UK,EN,WA,NI
* https://results.ffteducationdatalab.org.uk/gcse/bespoke.php?sbj=FREN|options=15,16,17
* https://results.ffteducationdatalab.org.uk/gcse/bespoke.php?sbj=FREN|options=EN16,WA16,NI17

### Small multiples
This allows comparison of entry trends in a multiple subject in a panel of charts.

The URL used is of one of the form:

* https://results.ffteducationdatalab.org.uk/gcse/small_multiple.php?sbj=FREN,GERM,SPAN,PHYS,CHEM,GEOG,HIST,BIOL,MATH,ENLA,ENLI,RELS

## Licence
* Python scripts are made available here under the MIT licence - see the `LICENSE` file for full details.
* Content of [the results day analysis microsite](https://results.ffteducationdatalab.org.uk/) - for example, written analysis of entry numbers and grades for each subject - is made available under a [Creative Commons attribution licence (CC BY 4.0)](https://creativecommons.org/licenses/by/4.0/).
* Source data is produced by the [Joint Council for Qualifications](https://www.jcq.org.uk/). Questions relating to reuse of the source data should be directed to JCQ.
