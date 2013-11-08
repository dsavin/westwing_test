<?php

class Application_Form_Westwing extends Zend_Form
{

    public function parseCSV($csv_data_to_parse)
    {
        if (($handle = fopen($csv_data_to_parse, "r")) !== FALSE) {

            $csv_data = array();
            $row = 0;

            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {



                /*
                 * skip the first line of the CSV file
                 */

                if ($row >= 1) {
                    $csv_data[] = array('id' => $data[0], 'firstname' => $data[1], 'lastname' => $data[2]);

                    foreach ($csv_data as $key => $row) {
                        $firstname[$key] = $row['firstname'];
                        $lastname[$key] = $row['lastname'];
                    }


                    array_multisort($firstname, SORT_ASC, $lastname, SORT_ASC, $csv_data);

                }
                $row++;
            }

            fclose($handle);
            //Zend_Debug::dump($csv_data);
            return $csv_data;
        }
    }

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        $this->setMethod('post');
        $this->setName('Westwing form test');
        $this->setAttrib('enctype', 'multipart/form-data');

        // Add an email element
        $this->addElement('text', 'email', array(
            'label' => 'Your email address:',
            'required' => true,
            'filters' => array('StringTrim'),
            'validators' => array(
                'EmailAddress',
            )
        ));

        /*
         * The Following code creates an object for the file input
         * using Zend_Form_Element_File.
         */
        $element = new Zend_Form_Element_File('csv');
        $element->setLabel('Upload a *.csv data file:')
            ->setRequired(true);
        $element->addValidator('Count', false, 1);
        $element->addValidator('Size', false, 102400);
        // only *.csv extension allowed
        $element->addValidator('Extension', false, 'csv');

        $this->addElements(array($element));

        $this->addElement('submit', 'submit', array(
            'ignore' => true,
            'label' => 'Upload file',
        ));

        $this->addElement('hash', 'csrf', array(
            'ignore' => true,
        ));
    }


}

