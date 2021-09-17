auditorium
==========

``Auditorium`` is the model that represents an auditorium. Your Colorresponding table
in the database it is called ``audit``.

attributes
---------

name ``VARCHAR(20)``
   Auditorium name

capacity ``INTEGER``
   How many people can the auditorium hold.

accessible ``BOOLEAN``
   Whether the auditorium meets the accessibility requirements.

location ``VARCHAR(100)``
   Location of the auditorium.

obs ``TEXT``
   Additional remarks about the auditorium.

Methods
-------

statusOn( ``Carbon $date`` )
   Returns a ``Status`` object representing the status of the audience on date ``$date``.

   See: :doc:`/helpers/status`.

Views
-----

index
   View where all auditoriums and their status for a given day are displayed.

   Receives as an optional GET parameter a ``data``; if none is provided, use
   the current date. It also receives the ``previous`` and ``next`` parameters, which implement
   the functionality of the arrows.