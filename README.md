# JB Reverse Segments

Sometimes you don't care how many segments are in the url, you just care about two or three of them at the end. This extension allows you to easily access those yy reversing the order in which you access them (counting from right to left).

Using the following url...
http://www.yourdomain.com/tvshows/scifi/stargate

In ExpressionEngine {segment_1} = tvshows, {segment_2} = scifi and {segment_3} - stargate.

Using JB Reverse Segments on the same url...
{reverse_segment_1} = stargate, {reverse_segment_2} = scifi and {reverse_segment_3} = tvshows.

The extension builds the variables upon page load so it shouldn't matter how many segments there are - just count from right to left.

{reverse_segment_1}
{reverse_segment_2}
etc...
