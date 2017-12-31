#!/usr/local/bin/perl
#Other forms of shebang line
#!/usr/local/bin/perl
#!/usr/bin/perl

##################################### GLOBALS ################################################
# @grid_lines;
######################################SUBROUTINES#########################################################
#  sub get_query #<9>
#  sub unescape #<11>
#  sub get_mainparameter #<8>
#  sub error_message #<15>
#  sub is_code_in_list #($code, @codes) #<14>
#  sub load_datafile #<4>
# sub process_grid #<20>
##########################################################################################################

print "Content-type:text/html\n\n";

#Get hash array of input label/data item pairs
%query = &get_query;

#Delete submit button from hash array
$submit_key = "SUBMIT";
if (exists $query{$submit_key})
{
  delete $query{$submit_key};
}

#Get data file name
$data_file = &get_mainparameter('DATA_FILE');
$data_file = lc($data_file);
$data_file =~ s/<root>/$ENV{'DOCUMENT_ROOT'}/i;
$data_file =~ s/\/\//\//i;#Remove double slashes

$comp_name = &get_mainparameter('COMP_NAME');

$person_code_name = &get_mainparameter('PERSON_LIST');
my @fields = split /=/, $person_code_name;
$person_code = (@fields)[0];
$person_name = (@fields)[1];

#print "<html><head><title>Scoresheet page</title></head><body>\n";
#print "$data_file, $person_code, $person_name,$comp_name <br>";
#print "</body></html>\n";

#Get @scoresheet_data
&load_datafile;

#exit;

#*************************QUERY PARSING ROUTINES***********************************************
sub get_query #<9>
{
    local($query_string);
    local(@lines);
    local($method)=$ENV{'REQUEST_METHOD'};

    if ($method eq 'GET')
    {
      # If method is GET fetch the query from the environment.
	$query_string = $ENV{'QUERY_STRING'};
    }
    elsif ($method eq 'POST')
    {
	# If the method is POST, fetch the query from standard in
	read(STDIN,$query_string,$ENV{'CONTENT_LENGTH'});
    }

    # No data.  Return an empty array.
    return () unless $query_string;

    # We now have the query string.
    # Call parse_params() to split it into key/value pairs
    return &parse_params($query_string);
}

#*******************SPLIT STRING INTO KEY/VALUE PAIR HASH ARRAY**************************
sub parse_params #<10>
{
    #Split string at '&' to get array @pairs
    local($tosplit) = @_;
    local(@pairs) = split('&',$tosplit);
    local($param,$value,%parameters);

    #Loop on elements of @pairs to extract key/value
    foreach (@pairs)
    {
      #Split at '='
	($param,$value) = split('=');

      #Key/value pairs are URL encoded, so call unescape to decode escaped characters
	$param = &unescape($param);
	$value = &unescape($value);

	if ($parameters{$param})
      {
          #If more than one element has same key, pack values into one with ';' 
	    $parameters{$param} .= "$;$value";
	}
      else
      {
          #Otherwise just set the hash element value
	    $parameters{$param} = $value;
	}
    }
    return %parameters;
}

#************************
sub unescape #<11>
{
    local($todecode) = @_;

    #Transliterate pluses into spaces
    $todecode =~ tr/+/ /;

    #Undo hex
    $todecode =~ s/%([0-9A-Fa-f]{2})/pack("c",hex($1))/ge;

    return $todecode;
}

#***********************EXTRACT MAIN PARAMETER*************************************************
sub get_mainparameter #<8>
{
  my $value;
  if (exists $query{$_[0]})
  {
    $value = $query{$_[0]};
    delete $query{$_[0]};
  }

#  print "<html><head><title>Diagnostic</title></head><body>\n<h1>Key:$_[0] VALUE:$value</h1>\n";
#  print "</body></html>\n";

  return $value;
}

#**********************************TEST TO SEE IF A CODE IS IN LIST*********************************
sub is_code_in_list #($code, @codes) #<14>
{
  my ($code, $testcode, $retval, @codelist);
  $code = shift;
  $code =~ s/[^!-z]//g;

  $retval = "false";
  foreach $testcode (@_)
  {
    $testcode =~ s/[^.-z]//g;
    if ($testcode eq $code)
    {
      $retval = "true";
      last;
    }
  }

  return $retval;
}

#************************ERROR IN OPENING DATA FILE**************************************************
sub error_message #<15>
{
    print "<html><head><title>Error message</title></head><body>";
    print $_[0];
    print "</body></html>";
    exit;
}

#************************LOAD SCORESHEET DATA FILE***************************************************
sub load_datafile #<4>
{
#  print "Start loading database:$data_file<br>";

  open(INPUT, "<$data_file") || &error_message("<h1>Error: Scoresheet data file $data_file not found on server.</h1>");
  @scoresheet_data = <INPUT>;
  close(INPUT);

  $ncount = @scoresheet_data;
#  print "Database loaded:$ncount lines<br>";


print <<"HTML";
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Scoresheet</title>
</head>
<body>
<p align=center><font size="5"><strong><em>$comp_name</em></strong></font><br>
<font size="4"><strong><em>Scoresheets for $person_name</em></strong></font></p>
<font size="3"><strong><em>List of entries (Click on entry to go to scoresheet)<br></em></strong></font>
HTML

  $count = 0;
  my $bSkipRecord = "false";
  foreach $record (@scoresheet_data) #Search all records in file
  {
     my $nloc0 = index($record, "<");#start of number line
     my $nloc1 = index($record, "|");#start of grid line
     my $nloc2 = index($record, ">");#end of grid
     if ($nloc0 == 0)  #start of number line
     {
       $record =~ s/<//;
       my @numbers = split /,/, $record;
       $bIsCodeInList = &is_code_in_list($person_code, @numbers);
       if ($bIsCodeInList eq "false")
       {
         $bSkipRecord = "true";
       }
       else
       {
         #Reset arrays;
         @grid_lines = ();
         $bSkipRecord = "false";
       }
     }
     elsif ($nloc1 == 0)  #start of grid line
     {
       if ($bSkipRecord eq "false")
       {
         push @grid_lines, $record;
       }
     }
     elsif ($nloc2 == 0)  #end of grid
     {
       if ($bSkipRecord eq "false")
       {
         &process_grid();
       }
       $bSkipRecord = "false";
     }
     else   #Start of text line
     {
       if ($bSkipRecord eq "false")
       {
         push @grid_lines, $record;
       }
     }
  }

  foreach $textline (@header_lines) #Show all text lines
  {
print <<"HTML";
     $textline
HTML
  }

print <<"HTML";
     <hr>
HTML

  foreach $textline (@text_lines) #Show all text lines
  {
print <<"HTML";
     $textline
HTML
  }


print <<"HTML";
</body>
</html>
HTML

}

#**********************************PROCESS GRID********************************
sub process_grid #<20>
{
  my $textline;
  my $text_count = 0;
  my $bInGrid = "false";
  my $label;
  foreach $line (@grid_lines)
  {
     my $nloc0 = index($line, "|");#start of grid line
     my $nloc1 = index($line, "=");#start of header
     if ($nloc0 == 0)  #start of grid line
     {
       if ($bInGrid eq "false")#First grid line, start of grid
       {
         $bInGrid = "true";
         $textline = "<table border=\"2\"  cellspacing=\"0\">";
         push @text_lines, $textline;
       }

       my @fields = split /\|/, $line;
       shift(@fields);#Remove first (empty) field
       pop(@fields);#Remove last (empty) field
       $textline = "<tr>";
       push @text_lines, $textline;
       foreach $field (@fields)
       {
         if ($field eq "")
         {
           $field = "&nbsp";
         }
         $textline = "<td>$field</td>";
         push @text_lines, $textline;
       }
       $textline = "</tr>";
       push @text_lines, $textline;

       $text_count = 0;
     }
     else  #start of text line
     {
       if ($bInGrid eq "true")#At end of grid
       {
         $bInGrid = "false";
         $textline = "</table><hr>";
         push @text_lines, $textline;
       }

       ++$count;
       $label = "label_$count";
       if ($nloc1 == 0)#start of header
       {
         $line =~ s/=//;
         $textline = "<hr><p><a name=$label><font size=\"4\"><strong>$line</strong></font></a></p>";
         push @text_lines, $textline;
       }
       else
       {
         $textline = "<p><a name=$label><font size=\"3\"><strong><em>$line</em></strong></font></a></p>";
         push @text_lines, $textline;
       }

       if ($text_count == 0)
       {
         $textline = "<a href=#$label><font size=\"3\"><strong><em>$line</em></strong></font></a><br>";
         push @header_lines, $textline;
       }

       ++$text_count;
     }
  }

  if ($bInGrid eq "true")
  {
      $textline = "</table><hr>";
      push @text_lines, $textline;
   }
}
